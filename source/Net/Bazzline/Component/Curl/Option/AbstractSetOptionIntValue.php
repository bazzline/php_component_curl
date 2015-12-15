<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractSetOptionIntValue implements OptionInterface
{
    /** @var mixed */
    private $valueForThisOption;

    /**
     * @param int $valueForThisOption
     */
    public function __construct($valueForThisOption)
    {
        $this->valueForThisOption = $valueForThisOption;
    }

    /**
     * @return int
     */
    public function value()
    {
        return $this->valueForThisOption;
    }
}