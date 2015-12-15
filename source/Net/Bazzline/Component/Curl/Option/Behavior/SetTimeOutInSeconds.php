<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetTimeOutInSeconds extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_TIMEOUT;
    }
}