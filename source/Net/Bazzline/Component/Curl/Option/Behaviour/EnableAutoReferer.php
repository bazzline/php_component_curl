<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableAutoReferer extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_AUTOREFERER;
    }
}
