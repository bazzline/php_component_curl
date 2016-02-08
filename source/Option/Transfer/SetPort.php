<?php

namespace Net\Bazzline\Component\Curl\Option\Transfer;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionIntValue;

class SetPort extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PORT;
    }
}
