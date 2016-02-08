<?php

namespace Net\Bazzline\Component\Curl\Option\Ftp;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableFtpAppend extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FTPAPPEND;
    }
}
