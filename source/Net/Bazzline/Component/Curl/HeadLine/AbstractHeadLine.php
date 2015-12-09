<?php

namespace Net\Bazzline\Component\Curl\HeadLine;

abstract class AbstractHeadLine implements HeadLineInterface
{
    /**
     * @return string
     */
    public function line()
    {
        return $this->prefix() . ': ' . $this->suffix();
    }

    /**
     * @return string
     */
    abstract protected function prefix();

    /**
     * @return string
     */
    abstract protected function suffix();
}