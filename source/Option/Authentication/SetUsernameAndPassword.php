<?php

namespace Net\Bazzline\Component\Curl\Option\Authentication;

use Net\Bazzline\Component\Curl\Option\OptionInterface;

class SetUsernameAndPassword implements OptionInterface
{
    /** @var string */
    private $password;

    /** @var string */
    private $username;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->password = $password;
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_USERPWD;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->username . ':' . $this->password;
    }
}