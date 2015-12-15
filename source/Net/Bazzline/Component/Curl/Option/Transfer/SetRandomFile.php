<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetRandomFile extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_RANDOM_FILE;
    }
}