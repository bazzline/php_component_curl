<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetMaxConnects extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_MAXCONNECTS;
    }
}
