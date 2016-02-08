<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Net\Bazzline\Component\Curl\Dispatcher;

use Net\Bazzline\Component\Curl\Response\Response;

interface DispatcherInterface
{
    /**
     * @param string $url
     * @param array $options
     * @return Response
     */
    public function dispatch($url, array $options = array());
}
