<?php

namespace Net\Bazzline\Component\Curl\Option\Cookie;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionStringValue;

class SetCookieFile extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_COOKIEFILE;
    }
}