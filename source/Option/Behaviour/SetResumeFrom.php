<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionIntValue;

class SetResumeFrom extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_RESUME_FROM;
    }
}
