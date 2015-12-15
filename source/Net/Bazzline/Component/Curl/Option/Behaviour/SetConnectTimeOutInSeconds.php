<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetConnectTimeOutInSeconds extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CONNECTTIMEOUT;
    }
}
