<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetPort extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PORT;
    }
}
