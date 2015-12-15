<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetDnsCacheTimeout extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_DNS_CACHE_TIMEOUT;
    }
}
