<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetEgdSocket extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_EGDSOCKET;
    }
}