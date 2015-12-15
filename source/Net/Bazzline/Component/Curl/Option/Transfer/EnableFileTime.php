<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableFileTime extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FILETIME;
    }
}
