<?php

namespace Net\Bazzline\Component\Curl\Option\Transfer;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToFalse;

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
