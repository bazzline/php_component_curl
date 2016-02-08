<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractSetOptionToTrue implements OptionInterface
{
    /**
     * @return bool
     */
    public function value()
    {
        return true;
    }
}