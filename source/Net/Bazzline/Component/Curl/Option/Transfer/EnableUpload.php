<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableUpload extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_UPLOAD;
    }
}
