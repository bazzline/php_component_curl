<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableUnrestrictedAuth extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_UNRESTRICTED_AUTH;
    }
}
