<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

use Mockery;
use Net\Bazzline\Component\Curl\Builder\Builder;
use Net\Bazzline\Component\Curl\Dispatcher\DispatcherInterface;
use Net\Bazzline\Component\Curl\Request\Request;
use Net\Bazzline\Component\Curl\Response\Response;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;
use PHPUnit_Framework_TestCase;

abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{

    /**
     * @param string $method
     * @param array $headerLines
     * @param array $options
     * @param null|mixed $data
     * @return array
     */
    protected function buildDispatcherOptions($method, array $headerLines = array(), array $options = array(), $data = null)
    {
        $isDataProvided         = (!is_null($data));
        $headerLines[]          = 'X-HTTP-Method-Override: ' . $method; //@see: http://tr.php.net/curl_setopt#109634
        $dispatcherOptions      = $options;

        $dispatcherOptions[CURLOPT_CUSTOMREQUEST]   = $method;
        $dispatcherOptions[CURLOPT_HTTPHEADER]      = $headerLines;

        if ($isDataProvided) {
            $dispatcherOptions[CURLOPT_POSTFIELDS] = $data;
        }

        return $dispatcherOptions;
    }

    /**
     * @return Mockery\MockInterface|\Net\Bazzline\Component\Curl\ResponseBehaviour\ResponseBehaviourInterface'
     */
    protected function getMockOfTheBehaviour()
    {
        return Mockery::mock('Net\Bazzline\Component\Curl\ResponseBehaviour\ResponseBehaviourInterface');
    }

    /**
     * @return Mockery\MockInterface|DispatcherInterface
     */
    protected function getMockOfTheDispatcher()
    {
        return Mockery::mock('Net\Bazzline\Component\Curl\Dispatcher\DispatcherInterface');
    }

    /**
     * @param Request $request
     * @param array $defaultResponseBehaviours
     * @return Builder
     */
    protected function getNewBuilder(Request $request, array $defaultResponseBehaviours = array())
    {
        return new Builder($request, new Merge(), $defaultResponseBehaviours);
    }

    /**
     * @param DispatcherInterface $dispatcher
     * @param array $defaultHeaderLines
     * @param array $defaultOptions
     * @return Request
     */
    protected function getNewRequest(DispatcherInterface $dispatcher, array $defaultHeaderLines = array(), array $defaultOptions = array())
    {
        return new Request($dispatcher, new Merge(), $defaultHeaderLines, $defaultOptions);
    }

    /**
     * @param mixed $content
     * @param string $contentType
     * @param string $error
     * @param int $errorCode
     * @param array $headLines
     * @param int $statusCode
     * @return Response
     */
    protected function getNewResponse($content = 'example content', $contentType = 'example content type', $error = '', $errorCode = 0, array $headLines = array(), $statusCode = 200)
    {
        return new Response($content, $contentType, $error, $errorCode, $headLines, $statusCode);
    }

    /**
     * @return string
     */
    protected function getUrl()
    {
        return 'http://www.foo.bar';
    }
}
