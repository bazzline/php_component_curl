<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableCertInfo extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CERTINFO;
    }
}
