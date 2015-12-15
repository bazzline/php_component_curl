<?php

namespace Net\Bazzline\Component\Curl\Option;

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