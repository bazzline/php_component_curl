<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetStderr extends AbstractSetOptionStreamValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_STDERR;
    }
}