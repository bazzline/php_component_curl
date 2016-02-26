<?php

namespace Net\Bazzline\Component\Curl\HeaderLine;

class ContentTypeIsUtf8Form extends AbstractContentType
{
    /**
     * @return string
     */
    protected function suffix()
    {
        return 'application/x-www-form-urlencoded; charset=UTF-8';
    }
}
