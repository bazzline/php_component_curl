<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableVerbose extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_VERBOSE;
    }
}
