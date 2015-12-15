<?php

namespace Net\Bazzline\Component\Curl\Option;

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
