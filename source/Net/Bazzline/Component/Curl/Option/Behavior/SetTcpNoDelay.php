<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetTcpNoDelayMixed extends AbstractSetOptionMixedValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_TCP_NODELAY;
    }
}
