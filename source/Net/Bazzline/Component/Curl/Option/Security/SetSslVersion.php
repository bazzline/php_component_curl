<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslVersion extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLVERSION;
    }
}
