<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-21
 */

namespace Net\Bazzline\Component\Curl\Dispatcher;

use Net\Bazzline\Component\Curl\Response\Response;

class LoggingDispatcher extends Dispatcher
{
    /**
     * @param string $url
     * @param array $options
     * @return Response
     */
    public function dispatch($url, array $options = array())
    {
        $this->log($url, $options);

        return parent::dispatch($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     */
    protected function log($url, array $options)
    {
        echo 'url: ' . $url . PHP_EOL;
        echo 'options: ' . PHP_EOL;
        echo var_export($options, true) . PHP_EOL;
    }
}
