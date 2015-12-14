<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

use Mockery;
use Net\Bazzline\Component\Curl\Dispatcher;
use Net\Bazzline\Component\Curl\Request;
use Net\Bazzline\Component\Curl\Response;
use PHPUnit_Framework_TestCase;

abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @return Mockery\MockInterface|Dispatcher
     */
    protected function getMockOfTheDispatcher()
    {
        return Mockery::mock('Net\Bazzline\Component\Curl\Dispatcher');
    }

    /**
     * @param Dispatcher $dispatcher
     * @param array $defaultHeaderLines
     * @param array $defaultOptions
     * @return Request
     */
    protected function getNewRequest(Dispatcher $dispatcher, array $defaultHeaderLines = array(), array $defaultOptions = array())
    {
        return new Request($dispatcher, $defaultHeaderLines, $defaultOptions);
    }

    /**
     * @param mixed $content
     * @param string $contentType
     * @param string $error
     * @param int $errorCode
     * @param int $statusCode
     * @return Response
     */
    protected function getNewResponse($content, $contentType, $error, $errorCode, $statusCode)
    {
        return new Response($content, $contentType, $error, $errorCode, $statusCode);
    }
}
