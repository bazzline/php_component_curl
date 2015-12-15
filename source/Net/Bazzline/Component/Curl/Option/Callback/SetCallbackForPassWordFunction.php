<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetCallbackForPassWordFunction extends AbstractSetOptionClosureValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_PASSWDFUNCTION;
    }
}