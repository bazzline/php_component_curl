<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetInFileSize extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_INFILESIZE;
    }
}
