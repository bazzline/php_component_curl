<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

use Mockery;
use Net\Bazzline\Component\Curl\DispatcherInterface;
use Net\Bazzline\Component\Curl\Request;
use Net\Bazzline\Component\Curl\Response;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;
use PHPUnit_Framework_TestCase;

abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @return string
     */
    protected function getUrl()
    {
        return 'http://www.foo.bar';
    }

    /**
     * @return Mockery\MockInterface|DispatcherInterface
     */
    protected function getMockOfTheDispatcher()
    {
        return Mockery::mock('Net\Bazzline\Component\Curl\DispatcherInterface');
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
     * @param int $statusCode
     * @return Response
     */
    protected function getNewResponse($content = 'example content', $contentType = 'example content type', $error = '', $errorCode = 0, $statusCode = 200)
    {
        return new Response($content, $contentType, $error, $errorCode, $statusCode);
    }
}
