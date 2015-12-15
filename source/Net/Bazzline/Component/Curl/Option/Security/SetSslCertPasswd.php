<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslCertPasswd extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLCERTPASSWD;
    }
}