<?php

namespace Net\Bazzline\Component\Curl\Option;

class DisableDnsUseGlobalCache extends AbstractSetOptionToFalse
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_DNS_USE_GLOBAL_CACHE;
    }
}
