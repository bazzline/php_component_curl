<?php

namespace Net\Bazzline\Component\Curl\Option\Behaviour;

use Net\Bazzline\Component\Curl\Option\AbstractSetOptionIntValue;

class SetRedirProtocols extends AbstractSetOptionIntValue
{
    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_REDIR_PROTOCOLS;
    }
}
