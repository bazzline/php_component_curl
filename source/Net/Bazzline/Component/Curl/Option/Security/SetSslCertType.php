<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslCertType extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLCERTTYPE;
    }
}