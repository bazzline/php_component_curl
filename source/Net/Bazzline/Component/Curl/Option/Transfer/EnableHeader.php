<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableHeader extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_HEADER;
    }
}
