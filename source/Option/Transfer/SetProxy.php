<?php

namespace Net\Bazzline\Component\Curl\Option\Transfer;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionStringValue;

class SetProxy extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PROXY;
    }
}