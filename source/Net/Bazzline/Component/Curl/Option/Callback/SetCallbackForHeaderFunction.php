<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCallbackForHeaderFunction extends AbstractSetOptionClosureValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_HEADERFUNCTION;
    }
}