<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableMute extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_MUTE;
    }
}
