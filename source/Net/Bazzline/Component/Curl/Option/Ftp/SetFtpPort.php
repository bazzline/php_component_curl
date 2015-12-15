<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetFtpPort extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FTPPORT;
    }
}