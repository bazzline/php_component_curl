<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractSetOptionToFalse implements OptionInterface
{
    /**
     * @return bool
     */
    public function value()
    {
        return false;
    }
}