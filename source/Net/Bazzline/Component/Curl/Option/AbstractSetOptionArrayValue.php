<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractSetOptionArrayValue implements OptionInterface
{
    /** @var mixed */
    private $valueForThisOption;

    /**
     * @param array $valueForThisOption
     */
    public function __construct(array $valueForThisOption)
    {
        $this->valueForThisOption = $valueForThisOption;
    }

    /**
     * @return array
     */
    public function value()
    {
        return $this->valueForThisOption;
    }
}