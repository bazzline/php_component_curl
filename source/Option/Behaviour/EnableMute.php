<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionToTrue;

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
