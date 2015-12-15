<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableSafeUpload extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SAFE_UPLOAD;
    }
}
