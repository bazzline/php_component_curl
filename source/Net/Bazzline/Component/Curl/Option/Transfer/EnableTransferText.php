<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableTransferText extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_TRANSFERTEXT;
    }
}
