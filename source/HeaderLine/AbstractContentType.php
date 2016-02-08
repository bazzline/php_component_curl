<?php

namespace Net\Bazzline\Component\Curl\HeaderLine;

abstract class AbstractContentType extends AbstractHeaderLine
{
    /**
     * @return string
     */
    protected function prefix()
    {
        return 'Content-Type';
    }
}
