<?php

namespace Net\Bazzline\Component\Curl\HeadLine;

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
