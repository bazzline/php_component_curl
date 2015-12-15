<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCaPath extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CAPATH;
    }
}