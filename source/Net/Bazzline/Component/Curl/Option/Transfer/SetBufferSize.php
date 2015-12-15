<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetBufferSize extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_BUFFERSIZE;
    }
}
