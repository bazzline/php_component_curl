<?php

namespace Net\Bazzline\Component\Curl\Option;

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