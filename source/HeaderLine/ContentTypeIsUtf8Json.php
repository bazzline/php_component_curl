<?php

namespace Net\Bazzline\Component\Curl\HeaderLine;

class ContentTypeIsUtf8Json extends AbstractContentType
{
    /**
     * @return string
     */
    protected function suffix()
    {
        return 'application/json; charset=UTF-8';
    }
}
