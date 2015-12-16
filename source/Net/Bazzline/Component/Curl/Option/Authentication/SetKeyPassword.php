<?php

namespace Net\Bazzline\Component\Curl\Option\Authentication;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionStringValue;

class SetKeyPassword extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_KEYPASSWD;
    }
}