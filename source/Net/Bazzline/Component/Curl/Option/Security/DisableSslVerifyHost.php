<?php

namespace Net\Bazzline\Component\Curl\Option\Security;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToFalse;

class DisableSslVerifyHost extends AbstractSetOptionToFalse
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSL_VERIFYHOST;
    }
}
