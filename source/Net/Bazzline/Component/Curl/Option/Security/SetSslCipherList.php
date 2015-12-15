<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetSslCipherList extends AbstractSetOptionStringValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_SSL_CIPHER_LIST;
    }
}