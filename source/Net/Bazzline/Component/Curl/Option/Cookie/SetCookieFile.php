<?php

namespace Net\Bazzline\Component\Curl\Option;

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