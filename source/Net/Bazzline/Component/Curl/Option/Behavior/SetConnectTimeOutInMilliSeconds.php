<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetConnectTimeOutInMilliSeconds extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CONNECTTIMEOUT_MS;
    }
}
