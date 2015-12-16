<?php

namespace Net\Bazzline\Component\Curl\Option\Callback;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionClosureValue;

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