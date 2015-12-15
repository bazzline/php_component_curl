<?php

namespace Net\Bazzline\Component\Curl\Option;

class SetOption implements OptionInterface
{
    /** @var int */
    private $key;

    /** @var mixed */
    private $value;

    /**
     * @param int $key
     * @param mixed $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function identifier()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }
}