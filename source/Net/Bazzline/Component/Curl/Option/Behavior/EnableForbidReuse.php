<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableForbidReuse extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FORBID_REUSE;
    }
}
