<?php

namespace Net\Bazzline\Component\Curl\Option\Cookie;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionArrayValue;

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
