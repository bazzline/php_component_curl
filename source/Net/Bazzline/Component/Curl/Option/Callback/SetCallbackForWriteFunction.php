<?php

namespace Net\Bazzline\Component\Curl\Option\Callback;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionClosureValue;

class SetCallbackForWriteFunction extends AbstractSetOptionClosureValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_WRITEFUNCTION;
    }
}