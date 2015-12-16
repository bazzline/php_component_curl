<?php

namespace Net\Bazzline\Component\Curl\Option\Transfer;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionStreamValue;

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