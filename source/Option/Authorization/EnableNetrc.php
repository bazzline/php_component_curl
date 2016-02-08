<?php

namespace Net\Bazzline\Component\Curl\Option\Authorization;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableNetrc extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_NETRC;
    }
}
