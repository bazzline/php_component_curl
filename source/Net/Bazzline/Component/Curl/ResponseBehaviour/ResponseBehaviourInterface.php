<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-08
 */
namespace Net\Bazzline\Component\Curl\ResponseBehaviour;

use Exception;
use Net\Bazzline\Component\Curl\Response;

interface ResponseBehaviourInterface
{
    /**
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function behave(Response $response);
}