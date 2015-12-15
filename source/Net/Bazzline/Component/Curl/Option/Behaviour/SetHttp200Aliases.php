<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetHttp200Aliases extends AbstractSetOptionArrayValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_HTTP200ALIASES;
    }
}