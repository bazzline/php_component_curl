<?php

namespace Net\Bazzline\Component\Curl\Option;

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
