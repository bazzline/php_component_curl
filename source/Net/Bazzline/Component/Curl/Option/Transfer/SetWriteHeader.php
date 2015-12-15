<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetWriteHeader extends AbstractSetOptionStreamValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_WRITEHEADER;
    }
}