<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetHttpVersion extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_HTTP_VERSION;
    }
}
