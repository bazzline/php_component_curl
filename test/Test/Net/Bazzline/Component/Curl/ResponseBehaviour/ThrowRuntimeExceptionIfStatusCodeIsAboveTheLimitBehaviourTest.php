<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-16
 */

namespace Test\Net\Bazzline\Component\Curl\ResponseBehaviour;

use Net\Bazzline\Component\Curl\Response\Response;
use Net\Bazzline\Component\Curl\ResponseBehaviour\ThrowRuntimeExceptionIfStatusCodeIsAboveTheLimitBehaviour;
use RuntimeException;
use Test\Net\Bazzline\Component\Curl\AbstractTestCase;

class ThrowRuntimeExceptionIfStatusCodeIsAboveTheLimitBehaviourTest extends AbstractTestCase
{
    /**
     * @return array
     */
    public function testCases()
    {
        return array(
            'status code below limit' => array(
                0,
                1,
                $this->createResponse(0),
                false
            ),
            'status code on the limit' => array(
                1,
                1,
                $this->createResponse(1),
                true
            ),
            'status code over the limit' => array(
                2,
                1,
                $this->createResponse(2),
                true
            )
        );
    }

    /**
     * @dataProvider testCases
     * @param int $statusCode
     * @param int $firstStatusCodeThatIsOverTheLimit
     * @param Response $response
     * @param bool $exceptionExpected
     */
    public function testBehaviour($statusCode, $firstStatusCodeThatIsOverTheLimit, Response $response, $exceptionExpected)
    {
        $behaviour = new ThrowRuntimeExceptionIfStatusCodeIsAboveTheLimitBehaviour($firstStatusCodeThatIsOverTheLimit);

        try {
            $behaviour->behave($response);
        } catch (RuntimeException $exception) {
            if ($exceptionExpected) {
                $expectedExceptionMessage = 'limit of status code exceeded. dumping response: ' . implode(', ', $response->convertIntoAnArray());
                $this->assertEquals($exception->getMessage(), $expectedExceptionMessage);
            } else {
                $this->fail('exception not expected: ' . $exception->getMessage());
            }
        }
    }

    /**
     * @param int $statusCode
     * @return Response
     */
    private function createResponse($statusCode)
    {
        return $this->getNewResponse('example content', 'example content type', '', 0, array(), $statusCode);
    }
}
