<?php

namespace Net\Bazzline\Component\Curl\Option;

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
