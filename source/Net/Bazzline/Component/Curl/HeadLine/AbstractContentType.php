<?php

namespace Net\Bazzline\Component\Curl\HeadLine;

abstract class AbstractContentType extends AbstractHeadLine
{
    /**
     * @return string
     */
    protected function prefix()
    {
        return 'Content-Type';
    }
}