<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslEngine extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLENGINE;
    }
}