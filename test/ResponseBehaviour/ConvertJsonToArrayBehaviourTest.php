<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-16
 */

namespace Test\Net\Bazzline\Component\Curl\ResponseBehaviour;

use Net\Bazzline\Component\Curl\ResponseBehaviour\ConvertJsonToArrayBehaviour;
use Test\Net\Bazzline\Component\Curl\AbstractTestCase;

class ConvertJsonToArrayBehaviourTest extends AbstractTestCase
{
    public function testBehaviour()
    {
        $behaviour          = new ConvertJsonToArrayBehaviour();
        $response           = $this->getNewResponse();

        $behavedResponse    = $behaviour->behave($response);
        $expectedContent    = json_decode($response->content(), true);

        $this->assertEquals($expectedContent, $behavedResponse->content());
    }
}
