<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCallbackForProgressFunction extends AbstractSetOptionClosureValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PROGRESSFUNCTION;
    }
}