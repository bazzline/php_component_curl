<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractAuthentication implements OptionInterface
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_HTTPAUTH;
    }
}