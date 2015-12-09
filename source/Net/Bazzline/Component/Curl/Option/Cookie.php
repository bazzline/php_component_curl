<?php

namespace Net\Bazzline\Component\Curl\Option;

class Cookie implements OptionInterface
{
    /** @var string */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = http_build_query($data, null, ';');
    }

    /**
     * @return int
     */
    public function identifier()
    {
        return CURLOPT_COOKIE;
    }

    /**
     * @return mixed
     */
    public function value()
    {
    return $this->data;
        return $this->username . ':' . $this->password;
    }
}
