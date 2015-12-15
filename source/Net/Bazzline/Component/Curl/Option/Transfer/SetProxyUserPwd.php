<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetProxyUserPwd extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PROXYUSERPWD;
    }
}