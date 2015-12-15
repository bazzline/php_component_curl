<?php

namespace Net\Bazzline\Component\Curl\Option;

class EnableBinaryTransfer extends AbstractSetOptionToTrue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_BINARYTRANSFER;
    }
}
