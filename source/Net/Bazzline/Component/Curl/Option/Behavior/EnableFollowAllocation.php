<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableFollowAllocation extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_FOLLOWLOCATION;
    }
}
