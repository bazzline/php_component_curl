<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractSetOptionMixedValue implements OptionInterface
{
    /** @var mixed */
    private $valueForThisOption;

    /**
     * @param mixed $valueForThisOption
     */
    public function __construct($valueForThisOption)
    {
        $this->valueForThisOption = $valueForThisOption;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->valueForThisOption;
    }
}