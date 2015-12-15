<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslKeyType extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLKEYTYPE;
    }
}