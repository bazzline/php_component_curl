<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetFtpSslAuth extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FTPSSLAUTH;
    }
}
