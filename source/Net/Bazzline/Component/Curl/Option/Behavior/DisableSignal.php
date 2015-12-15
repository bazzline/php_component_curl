<?php

namespace Net\Bazzline\Component\Curl\Option;

class DisableSignal extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_NOSIGNAL;
    }
}
