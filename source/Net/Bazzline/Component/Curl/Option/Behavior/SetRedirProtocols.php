<?php

namespace Net\Bazzline\Component\Curl\Option;

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
