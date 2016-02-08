<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableFreshConnect extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FRESH_CONNECT;
    }
}
