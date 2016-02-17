<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl\ResponseBehaviour;

use Exception;
use Net\Bazzline\Component\Curl\Response\Response;

class ConvertJsonToArrayBehaviour implements ResponseBehaviourInterface
{
    /**
     * Since the Response is immutable, each behaviour has to return a new
     *  Response instance
     *
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function behave(Response $response)
    {
        return new Response(
            json_decode($response->content(), true),
            $response->contentType(),
            $response->error(),
            $response->errorCode(),
            $response->headerLines(),
            $response->statusCode()
        );
    }
}
