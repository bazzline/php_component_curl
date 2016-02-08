<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionMixedValue;

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
