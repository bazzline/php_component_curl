<?php

namespace Net\Bazzline\Component\Curl\Option;

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
