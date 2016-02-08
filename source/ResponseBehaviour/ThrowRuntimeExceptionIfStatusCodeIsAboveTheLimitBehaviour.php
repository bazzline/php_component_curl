<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl\ResponseBehaviour;

use Exception;
use Net\Bazzline\Component\Curl\Response\Response;
use RuntimeException;

class ThrowRuntimeExceptionIfStatusCodeIsAboveTheLimitBehaviour implements ResponseBehaviourInterface
{
    /** @var int */
    private $statusCode;

    /**
     * @param int $firstStatusCodeThatIsOverTheLimit
     */
    public function __construct($firstStatusCodeThatIsOverTheLimit = 400)
    {
        $this->statusCode = (int) $firstStatusCodeThatIsOverTheLimit;
    }

    /**
     * Since the Response is immutable, each behaviour has to return a new
     *  Response instance
     *
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
