<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl\ResponseBehaviour;

use Exception;
use Net\Bazzline\Component\Curl\Response;

class ConvertJsonToArrayBehaviour implements ResponseBehaviourInterface
{
    /**
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function behave(Response $response)
    {
        return new Response(
            json_encode($response->content()),
            $response->contentType(),
            $response->errorCode(),
            $response->statusCode()
        );
    }
}