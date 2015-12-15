<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetInFile extends AbstractSetOptionStreamValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_INFILE;
    }
}