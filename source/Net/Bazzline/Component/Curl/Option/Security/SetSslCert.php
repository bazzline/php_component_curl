<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslCert extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLCERT;
    }
}