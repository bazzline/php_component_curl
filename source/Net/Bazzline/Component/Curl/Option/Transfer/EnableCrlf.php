<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableCrlf extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CRLF;
    }
}
