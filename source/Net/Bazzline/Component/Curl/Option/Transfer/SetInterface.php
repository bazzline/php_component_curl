<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetInterface extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_INTERFACE;
    }
}