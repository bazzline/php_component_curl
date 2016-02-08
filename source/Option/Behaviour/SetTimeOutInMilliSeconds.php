<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionIntValue;

class SetTimeOutInMilliSeconds extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_TIMEOUT_MS;
    }
}