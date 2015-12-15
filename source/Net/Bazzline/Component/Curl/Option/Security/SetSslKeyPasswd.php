<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslKeyPasswd extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLKEYPASSWD;
    }
}