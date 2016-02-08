<?php

namespace Net\Bazzline\Component\Curl\Option\Authentication;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableUnrestrictedAuth extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_UNRESTRICTED_AUTH;
    }
}
