<?php

namespace Net\Bazzline\Component\Curl\Option;

use Closure;

abstract class AbstractSetOptionClosureValue implements OptionInterface
{
    /** @var Closure */
    private $valueForThisOption;

    /**
     * @param Closure $valueForThisOption
     */
    public function __construct(Closure $valueForThisOption)
    {
        $this->valueForThisOption = $valueForThisOption;
    }

    /**
     * @return Closure
     */
    public function value()
    {
        return $this->valueForThisOption;
    }
}