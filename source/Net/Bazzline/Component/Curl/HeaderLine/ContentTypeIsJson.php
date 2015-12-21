<?php

namespace Net\Bazzline\Component\Curl\HeaderLine;

class ContentTypeIsJson extends AbstractContentType
{
    /**
     * @return string
     */
    protected function suffix()
    {
        return 'application/json';
    }
}
