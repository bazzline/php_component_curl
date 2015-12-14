<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

class ResponseTest extends AbstractTestCase
{
    public function testAll()
    {
        $content        = 'the content';
        $contentType    = 'the content type';
        $error          = 'this is an error';
        $errorCode      = __LINE__;
        $statusCode     = __LINE__;

        $response = $this->getNewResponse($content, $contentType, $error, $errorCode, $statusCode);

        $this->assertEquals($content, $response->content());
        $this->assertEquals($contentType, $response->contentType());
        $this->assertEquals($error, $response->error());
        $this->assertEquals($errorCode, $response->errorCode());
        $this->assertEquals($statusCode, $response->statusCode());
    }
}
