<?php

namespace Net\Bazzline\Component\Curl\HeaderLine;

class ContentTypeIsUtf8Html extends AbstractContentType
{
    /**
     * @return string
     */
    protected function suffix()
    {
        return 'text/html; charset=UTF-8';
    }
}
