<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */

namespace Net\Bazzline\Component\Curl\Dispatcher;

use Net\Bazzline\Component\Curl\Response\Response;

class Dispatcher implements DispatcherInterface
{
    /** @var array */
    private $headerLines;

    /**
     * @param string $url
     * @param array $options
     * @return Response
     */
    public function dispatch($url, array $options = array())
    {
        $this->reset();
        $handler    = $this->getHandler($url);
        $handler    = $this->setOptions($handler, $options);
        $response   = $this->execute($handler);

        return $response;
    }

    /**
     * @param resource $handler
     * @return Response
     */
    protected function execute($handler)
    {
        $content        = curl_exec($handler);
        $contentType    = curl_getinfo($handler, CURLINFO_CONTENT_TYPE);
        //@see http://stackoverflow.com/a/10667879
        $error          = curl_error($handler);
        $errorCode      = curl_errno($handler);
        $statusCode     = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        //@todo investigate if needed http://www.ivangabriele.com/php-how-to-use-4-methods-delete-get-post-put-in-a-restful-api-client-using-curl/
        //@todo how to handle response code 100 - other header? - http://stackoverflow.com/a/23939785
        curl_close($handler);

        return new Response($content, $contentType, $error, $errorCode, $this->headerLines, $statusCode);
    }

    /**
     * @param string $url
     * @return resource
     */
    protected function getHandler($url)
    {
        $handler = curl_init($url);

        return $handler;
    }

    /**
     * @param resource $handler
     * @param array $options
     * @return resource
     */
    protected function setOptions($handler, array $options)
    {
        $options[CURLINFO_HEADER_OUT]       = 1;
        $options[CURLOPT_HEADERFUNCTION]    = array($this, 'processHeadLine');
        $options[CURLOPT_RETURNTRANSFER]    = true;

        curl_setopt_array($handler, $options);

        return $handler;
    }



    /**
     * @param resource $handler
     * @param string $string
     * @return int
     */
    private function processHeadLine($handler, $string)
    {
        $delimiter  = ':';
        $exploded   = explode($delimiter, trim($string));
        $isValid    = (count($exploded) === 2);

        if ($isValid) {
            $prefix                     = array_shift($exploded);
            $this->headerLines[$prefix] = implode($delimiter, $exploded); //needed because of lines like "Date: Thu, 17 Dec 2015 16:47:42 GMT"
        }

        return strlen($string);
    }

    private function reset()
    {
        $this->headerLines = array();
    }
}
