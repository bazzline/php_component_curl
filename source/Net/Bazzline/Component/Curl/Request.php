<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-09
 */

namespace Net\Bazzline\Component\Curl;

use Net\Bazzline\Component\Curl\HeadLine\HeadLineInterface;
use Net\Bazzline\Component\Curl\Option\OptionInterface;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;

class Request
{
    //@see: http://developer.sugarcrm.com/2013/08/30/doing-put-and-delete-with-curl-in-php/
    const HTTP_METHOD_DELETE    = 'DELETE';
    const HTTP_METHOD_GET       = 'GET';
    const HTTP_METHOD_PATCH     = 'PATCH';
    const HTTP_METHOD_POST      = 'POST';
    const HTTP_METHOD_PUT       = 'PUT';

    /** @var array */
    private $defaultHeaderLines = array();

    /** @var array */
    private $defaultOptions = array();

    /** @var DispatcherInterface */
    private $dispatcher;

    /** @var array */
    private $headerLines = array();

    /** @var Merge */
    private $merge;

    /** @var array */
    private $options = array();

    /**
     * @param DispatcherInterface $dispatcher
     * @param Merge $merge
     * @param array $defaultHeaderLines
     * @param array $defaultOptions
     */
    public function __construct(DispatcherInterface $dispatcher, Merge $merge, array $defaultHeaderLines = array(), array $defaultOptions = array())
    {
        $this->defaultHeaderLines   = $defaultHeaderLines;
        $this->defaultOptions       = $defaultOptions;
        $this->dispatcher           = $dispatcher;
        $this->merge                = $merge;
    }

    /**
     * @return Request
     */
    public function __clone()
    {
        return new self(
            $this->dispatcher,
            $this->merge,
            $this->defaultHeaderLines,
            $this->defaultOptions
        );
    }

    /**
     * @param HeadLineInterface $line
     */
    public function addHeaderLine(HeadLineInterface $line)
    {
        $this->headerLines[] = $line->line();
    }

    /**
     * @param OptionInterface $option
     */
    public function addOption(OptionInterface $option)
    {
        $this->options[$option->identifier()] = $option->value();
    }

    /**
     * @param string $line - CURLOPT_* - see: http://php.net/manual/en/function.curl-setopt.php
     */
    public function addRawHeaderLine($line)
    {
        $this->headerLines[] = $line;
    }

    /**
     * @param string $key - CURLOPT_* - see: http://php.net/manual/en/function.curl-setopt.php
     * @param mixed $value
     */
    public function addRawOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * @param string $url
     * @param array $parameters
     * @return Response
     */
    public function get($url, array $parameters = array())
    {
        return $this->execute(
            $url,
            $parameters,
            array(),
            self::HTTP_METHOD_GET
        );
    }

    /**
     * @param string $url
     * @param array $parameters
     * @param null|string|array $data
     * @return Response
     */
    public function post($url, array $parameters = array(), $data = null)
    {
        return $this->execute(
            $url,
            $parameters,
            $data,
            self::HTTP_METHOD_POST
        );
    }

    /**
     * @param string $url
     * @param array $parameters
     * @param null|string|array $data
     * @return Response
     */
    public function put($url, array $parameters = array(), $data = null)
    {
        return $this->execute(
            $url,
            $parameters,
            $data,
            self::HTTP_METHOD_PUT
        );
    }

    /**
     * @param string $url
     * @param array $parameters
     * @param null|string|array $data
     * @return Response
     */
    public function patch($url, array $parameters = array(), $data = null)
    {
        return $this->execute(
            $url,
            $parameters,
            $data,
            self::HTTP_METHOD_PATCH
        );
    }

    /**
     * @param string $url
     * @param array $parameters
     * @return Response
     */
    public function delete($url, array $parameters = array())
    {
        return $this->execute(
            $url,
            $parameters,
            array(),
            self::HTTP_METHOD_DELETE
        );
    }

    /**
     * @see: https://de.wikipedia.org/wiki/Representational_State_Transfer
    public function head($url)
    {
    }
    public function options($url)
    {
    }
    public function trace($url)
    {
    }
     */

    /**
     * @param bool|false $alsoTheDefaults
     */
    public function reset($alsoTheDefaults = false)
    {
        $this->headerLines  = array();
        $this->options      = array();

        if ($alsoTheDefaults) {
            $this->defaultHeaderLines   = array();
            $this->defaultOptions       = array();
        }
    }

    /**
     * @param string $url
     * @param null|array $parameters
     * @param null|string|array $data
     * @param string $method
     * @return Response
     */
    private function execute($url, array $parameters = array(), $data = null, $method)
    {
        $dispatcher     = $this->dispatcher;
        $merge          = $this->merge;
        $headerLines    = $merge($this->headerLines, $this->defaultHeaderLines);
        $isDataProvided = (!is_null($data));
        $options        = $merge($this->options, $this->defaultOptions);

        $headerLines[]  = 'X-HTTP-Method-Override: ' . $method; //@see: http://tr.php.net/curl_setopt#109634

        $options[CURLOPT_CUSTOMREQUEST]     = $method; //@see: http://tr.php.net/curl_setopt#109634
        $options[CURLOPT_HEADER]            = 1;
        $options[CURLOPT_HTTPHEADER]        = $headerLines;
        //@todo needed we want to work with json?
        $options[CURLOPT_RETURNTRANSFER]    = true;

        if ($isDataProvided) {
            $dataIsNotFromTypeScalar   = (!is_scalar($data));

            if ($dataIsNotFromTypeScalar) {
                $data = http_build_query($data);
            }
            $options[CURLOPT_POSTFIELDS] = $data; //@see: http://www.lornajane.net/posts/2009/putting-data-fields-with-php-curl
        }

        if (!empty($parameters)) {
            $urlWithParameters = $url . '?' . http_build_query($parameters);
        } else {
            $urlWithParameters = $url;
        }

        $response = $dispatcher->dispatch($urlWithParameters, $options);

        return $response;
    }
}
