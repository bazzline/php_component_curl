<?php

namespace Net\Bazzline\Component\Curl\Option\Security;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToFalse;

class DisableSslVerifyPeer extends AbstractSetOptionToFalse
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSL_VERIFYPEER;
    }
}
