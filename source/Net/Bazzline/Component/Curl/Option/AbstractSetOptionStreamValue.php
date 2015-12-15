<?php

namespace Net\Bazzline\Component\Curl\Option;

abstract class AbstractSetOptionStreamValue implements OptionInterface
{
    /** @var mixed */
    private $valueForThisOption;

    /**
     * @param resource $valueForThisOption
     */
    public function __construct($valueForThisOption)
    {
        $this->valueForThisOption = $valueForThisOption;
    }

    /**
     * @return resource
     */
    public function value()
    {
        return $this->valueForThisOption;
    }
}