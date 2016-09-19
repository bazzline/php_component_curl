<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2016-09-19
 */
namespace Net\Bazzline\Component\Curl\HeaderLine;

class Custom extends AbstractHeaderLine
{
    /** @var string */
    private $prefix;

    /** @var string */
    private $suffix;

    /**
     * Custom constructor.
     *
     * @param string $identifier    - e.g. My-Header-Line - "X-" will be prefixed automatically
     * @param string $value         - e.g. bazzline
     */
    public function __construct($identifier, $value)
    {
        $this->prefix   = 'X-' . $identifier;
        $this->suffix   = $value;
    }

    /**
     * @return string
     */
    protected function prefix()
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    protected function suffix()
    {
        return $this->suffix;
    }
}
