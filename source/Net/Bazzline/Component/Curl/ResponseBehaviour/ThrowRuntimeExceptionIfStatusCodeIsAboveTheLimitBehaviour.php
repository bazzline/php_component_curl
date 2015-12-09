<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl\ResponseBehaviour;

use Exception;
use Net\Bazzline\Component\Curl\Response;
use RuntimeException;

class ThrowRuntimeExceptionIfStatusCodeIsAboveTheLimitBehaviour implements ResponseBehaviourInterface
{
    /** @var int */
    private $statusCode;

    /**
     * @param int $exceededStatusCodeLimit
     */
    public function __construct($exceededStatusCodeLimit)
    {
        $this->statusCode = (int) $exceededStatusCodeLimit;
    }

    /**
     * @param Response $response
     * @return Response
     * @throws Exception|RuntimeException
     */
    public function behave(Response $response)
    {
        $statusCodeIsToHigh = ($response->statusCode() > $this->statusCode);

        if ($statusCodeIsToHigh) {
            throw new RuntimeException(
                'limit of status code exceeded. dumping response: ' .
                implode(', ', $response->convertIntoAnArray())
            );
        }

        return $response;
    }
}