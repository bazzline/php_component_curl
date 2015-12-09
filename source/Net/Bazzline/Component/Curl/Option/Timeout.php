<?php

namespace Net\Bazzline\Component\Curl\Option;

class Timeout implements OptionInterface
{
    /** @var int $seconds */
    private $seconds;

    /**
     * @param int $seconds
     */
    public function __construct($seconds)
    {
        $this->seconds = $seconds;
    }

    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_TIMEOUT;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->seconds;
    }
}