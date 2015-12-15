<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetProxyAuth extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PROXYAUTH;
    }
}
