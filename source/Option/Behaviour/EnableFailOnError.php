<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableFailOnError extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FAILONERROR;
    }
}
