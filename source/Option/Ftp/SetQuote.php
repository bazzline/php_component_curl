<?php

namespace Net\Bazzline\Component\Curl\Option\Ftp;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionArrayValue;

class SetQuote extends AbstractSetOptionArrayValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_QUOTE;
    }
}