<?php

namespace Net\Bazzline\Component\Curl\Option;

class DisableProgress extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_NOPROGRESS;
    }
}
