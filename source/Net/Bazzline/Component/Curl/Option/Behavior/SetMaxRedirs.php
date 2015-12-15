<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetMaxRedirs extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_MAXREDIRS;
    }
}
