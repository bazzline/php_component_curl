<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-08
 */
namespace Net\Bazzline\Component\Curl\ResponseBehaviour;

use Exception;
use Net\Bazzline\Component\Curl\Response\Response;

interface ResponseBehaviourInterface
{
    /**
     * Since the Response is immutable, each behaviour has to return a new
     *  Response instance
     *
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function behave(Response $response);
}
