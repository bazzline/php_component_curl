<?php

namespace Net\Bazzline\Component\Curl\HeaderLine;

abstract class AbstractHeaderLine implements HeaderLineInterface
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
