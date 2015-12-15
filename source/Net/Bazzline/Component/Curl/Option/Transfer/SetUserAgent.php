<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetUserAgent extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_USERAGENT;
    }
}