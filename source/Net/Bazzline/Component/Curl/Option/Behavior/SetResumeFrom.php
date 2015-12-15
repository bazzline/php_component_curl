<?php

namespace Net\Bazzline\Component\Curl\Option;

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
