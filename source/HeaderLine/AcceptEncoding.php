<?php
/**
 * @author: stev leibelt <stev.leibelt@jobleads.de>
 * @since: 2016-09-19
 */
namespace Net\Bazzline\Component\Curl\HeaderLine;

class AcceptEncoding extends AbstractHeaderLine
{
    /** @var string */
    private $prefix;

    /** @var string */
    private $suffix;

    /**
     * AcceptEncoding constructor.
     *
     * @param array|string[] $encodings - e.g. array('gzip', 'deflate')
     */
    public function __construct(array $encodings)
    {
        $this->prefix = 'Accept-Encoding';
        $this->suffix = implode($encodings);
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
