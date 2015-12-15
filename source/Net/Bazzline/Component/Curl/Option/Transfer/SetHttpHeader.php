<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetHttpHeader extends AbstractSetOptionArrayValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_HTTPHEADER;
    }
}