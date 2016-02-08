<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractSetOptionStringValue implements OptionInterface
{
    /** @var mixed */
    private $valueForThisOption;

    /**
     * @param string $valueForThisOption
     */
    public function __construct($valueForThisOption)
    {
        $this->valueForThisOption = $valueForThisOption;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->valueForThisOption;
    }
}