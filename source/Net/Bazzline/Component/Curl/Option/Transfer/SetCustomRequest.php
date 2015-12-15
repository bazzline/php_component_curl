<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCustomRequest extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CUSTOMREQUEST;
    }
}