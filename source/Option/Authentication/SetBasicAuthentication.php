<?php

namespace Net\Bazzline\Component\Curl\Option\Authentication;

use Net\Bazzline\Component\Curl\Option\AbstractAuthentication;

class SetBasicAuthentication extends AbstractAuthentication
{
    /**
     * @return mixed
     */
    public function value()
    {
        return CURLAUTH_BASIC;
    }
}
