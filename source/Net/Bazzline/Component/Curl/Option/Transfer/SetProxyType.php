<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetProxyType extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PROXYTYPE;
    }
}
