<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetLowSpeedLimit extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_LOW_SPEED_LIMIT;
    }
}
