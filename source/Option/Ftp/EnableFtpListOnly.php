<?php

namespace Net\Bazzline\Component\Curl\Option\Ftp;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableFtpListOnly extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FTPLISTONLY;
    }
}
