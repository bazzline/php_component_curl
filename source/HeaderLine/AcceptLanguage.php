<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2016-09-19
 */
namespace Net\Bazzline\Component\Curl\HeaderLine;

class AcceptLanguage extends AbstractHeaderLine
{
    /** @var string */
    private $prefix;

    /** @var string */
    private $suffix;

    /**
     * AcceptLanguage constructor.
     *
     * @param string $content - compress, gzip | * | compress;q=0.5, gzip;q=1.0 | gzip;q=1.0, identity; q=0.5, *;q=0
     */
    public function __construct($content)
    {
        $this->prefix = 'Accept-Encoding';
        $this->suffix = $content;
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
