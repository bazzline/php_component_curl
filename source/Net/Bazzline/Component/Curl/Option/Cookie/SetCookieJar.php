<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCookieJar extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_COOKIEJAR;
    }
}