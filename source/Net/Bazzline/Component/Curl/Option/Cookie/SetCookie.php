<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCookie extends AbstractSetOptionArrayValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_COOKIE;
    }
}
