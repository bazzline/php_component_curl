<?php

namespace Net\Bazzline\Component\Curl\Option\Transfer;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

class EnableCrlf extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_CRLF;
    }
}
