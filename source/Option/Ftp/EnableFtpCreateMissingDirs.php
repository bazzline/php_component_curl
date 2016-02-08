<?php

namespace Net\Bazzline\Component\Curl\Option\Ftp;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableFtpCreateMissingDirs extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FTP_CREATE_MISSING_DIRS;
    }
}
