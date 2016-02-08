<?php

namespace Net\Bazzline\Component\Curl\Option\Ftp;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionArrayValue;

class SetPostQuote extends AbstractSetOptionArrayValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_POSTQUOTE;
    }
}