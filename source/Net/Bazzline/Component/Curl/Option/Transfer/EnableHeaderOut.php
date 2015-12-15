<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableHeaderOut extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLINFO_HEADER_OUT;
    }
}
