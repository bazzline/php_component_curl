<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetTimeValue extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_TIMEVALUE;
    }
}