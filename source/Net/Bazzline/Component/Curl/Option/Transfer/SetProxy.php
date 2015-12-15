<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetProxy extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PROXY;
    }
}