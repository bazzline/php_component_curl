<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCaInfo extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CAINFO;
    }
}