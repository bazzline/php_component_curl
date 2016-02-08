<?php

namespace Net\Bazzline\Component\Curl\Option\Security;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

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
