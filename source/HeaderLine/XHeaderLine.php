<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2016-09-19
 */
namespace Net\Bazzline\Component\Curl\HeaderLine;

class XHeaderLine extends AbstractHeaderLine
{
    /** @var string */
    private $prefix;

    /** @var string */
    private $suffix;

    /**
     * XHeaderLine constructor.
     *
     * @param string $identifier    - e.g. X-My-Headerline
     * @param string $value         - e.g. bazzline
     */
    public function __construct($identifier, $value)
    {
        $this->prefix   = $identifier;
        $this->suffix   = $value;
    }

    protected function prefix()
    {
        // TODO: Implement prefix() method.
    }

    protected function suffix()
    {
        // TODO: Implement suffix() method.
    }
}
