<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslVerifyHost extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSL_VERIFYHOST;
    }
}
