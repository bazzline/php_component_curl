<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCallbackForReadFunction extends AbstractSetOptionClosureValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_READFUNCTION;
    }
}