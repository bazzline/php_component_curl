<?php

namespace Net\Bazzline\Component\Curl\Option;

class DisableBody extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_NOBODY;
    }
}
