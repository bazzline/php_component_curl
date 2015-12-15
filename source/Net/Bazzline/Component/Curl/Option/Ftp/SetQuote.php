<?php

namespace Net\Bazzline\Component\Curl\Option;

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