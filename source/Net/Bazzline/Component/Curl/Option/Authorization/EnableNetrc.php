<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableNetrc extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_NETRC;
    }
}
