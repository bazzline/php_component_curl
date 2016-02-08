<?php

namespace Net\Bazzline\Component\Curl\Option\Cookie;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableCookieSession extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_COOKIESESSION;
    }
}
