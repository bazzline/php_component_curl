<?php

namespace Net\Bazzline\Component\Curl\Option;

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
