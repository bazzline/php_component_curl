<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableSslVerifyPeer extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSL_VERIFYPEER;
    }
}
