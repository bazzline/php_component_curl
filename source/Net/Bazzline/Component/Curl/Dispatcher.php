<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl;

class Dispatcher
{
    /**
     * @param string $url
     * @param array $options
     * @return Response
     */
    public function dispatch($url, array $options = array())
    {
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
        $errorCode      = curl_errno($handler);
        $statusCode     = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        //@todo investigate if needed http://www.ivangabriele.com/php-how-to-use-4-methods-delete-get-post-put-in-a-restful-api-client-using-curl/

        return new Response($content, $contentType, $errorCode, $statusCode);
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
        curl_setopt_array($handler, $options);

        return $handler;
    }
}