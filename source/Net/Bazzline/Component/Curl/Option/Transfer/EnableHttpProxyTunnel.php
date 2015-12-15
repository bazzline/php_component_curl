<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableHttpProxyTunnel extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_HTTPPROXYTUNNEL;
    }
}
