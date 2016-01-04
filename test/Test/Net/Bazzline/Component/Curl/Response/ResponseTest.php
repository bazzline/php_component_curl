<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

class ResponseTest extends AbstractTestCase
{
    public function testHeaderLineWithExistingPrefixes()
    {
        $content        = 'the content';
        $contentType    = 'the content type';
        $error          = 'this is an error';
        $errorCode      = __LINE__;
        $headerLines = array(
            'bar'   => 'foo',
            'foo'   => 'bar'
        );
        $statusCode     = __LINE__;

        $response = $this->getNewResponse($content, $contentType, $error, $errorCode, $headerLines, $statusCode);

        foreach ($headerLines as $prefix => $suffix) {
            $this->assertEquals($suffix, $response->headerLine($prefix));
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage no headline available for prefix: "foobar"
     */
    public function testHeaderLineWithNotExistingPrefixes()
    {
        $content        = 'the content';
        $contentType    = 'the content type';
        $error          = 'this is an error';
        $errorCode      = __LINE__;
        $headerLines = array();
        $statusCode     = __LINE__;

        $response = $this->getNewResponse($content, $contentType, $error, $errorCode, $headerLines, $statusCode);

        $this->assertEquals(null, $response->headerLine('foobar'));
    }

    public function testAll()
    {
        $content        = 'the content';
        $contentType    = 'the content type';
        $error          = 'this is an error';
        $errorCode      = __LINE__;
        $headerLines    = array();
        $statusCode     = __LINE__;

        $response = $this->getNewResponse($content, $contentType, $error, $errorCode, $headerLines, $statusCode);

        $this->assertEquals($content, $response->content());
        $this->assertEquals($contentType, $response->contentType());
        $this->assertEquals($error, $response->error());
        $this->assertEquals($errorCode, $response->errorCode());
        $this->assertEquals($headerLines, $response->headerLines());
        $this->assertEquals($statusCode, $response->statusCode());
    }
}
