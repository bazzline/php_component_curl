<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetEncoding extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_ENCODING;
    }
}