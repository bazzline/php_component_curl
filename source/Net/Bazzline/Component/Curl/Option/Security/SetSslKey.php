<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslKey extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLKEY;
    }
}