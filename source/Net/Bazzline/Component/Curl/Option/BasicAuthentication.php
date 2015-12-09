<?php

namespace Net\Bazzline\Component\Curl\Option;

class BasicAuthentication extends AbstractAuthentication
{
    /**
     * @return mixed
     */
    public function value()
    {
        return CURLAUTH_BASIC
    }
}