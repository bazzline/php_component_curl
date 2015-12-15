<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetTimeCondition extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_TIMECONDITION;
    }
}
