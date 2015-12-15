<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetFile extends AbstractSetOptionStreamValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FILE;
    }
}