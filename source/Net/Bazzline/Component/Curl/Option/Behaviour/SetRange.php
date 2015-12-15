<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetRange extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_RANGE;
    }
}