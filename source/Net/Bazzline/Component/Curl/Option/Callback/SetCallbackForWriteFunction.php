<?php

namespace Net\Bazzline\Component\Curl\Option;

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