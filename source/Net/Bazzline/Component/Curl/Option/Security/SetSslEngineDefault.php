<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslEngineDefault extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSLENGINE_DEFAULT;
    }
}