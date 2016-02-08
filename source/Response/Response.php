<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-09
 */

namespace Net\Bazzline\Component\Curl\Response;

use InvalidArgumentException;

class Response
{
    const ARRAY_KEY_CONTENT         = 'content';
    const ARRAY_KEY_CONTENT_TYPE    = 'content_type';
    const ARRAY_KEY_ERROR           = 'error';
    const ARRAY_KEY_ERROR_CODE      = 'error_code';
    const ARRAY_KEY_STATUS_CODE     = 'status_code';

    /** @var null|mixed */
    private $content;

    /** @var null|string */
    private $contentType;

    /** @var null|string */
    private $error;

    /** @var null|int */
    private $errorCode;

    /** @var array */
    private $headerLines;

    /** @var null|int */
    private $statusCode;

    /**
     * @param mixed $content
     * @param string $contentType
     * @param string $error
     * @param int $errorCode
     * @param array $headerLines
     * @param int $statusCode
     */
    public function __construct($content, $contentType, $error, $errorCode, array $headerLines, $statusCode)
    {
        $this->content      = $content;
        $this->contentType  = $contentType;
        $this->error        = $error;
        $this->errorCode    = $errorCode;
        $this->headerLines  = $headerLines;
        $this->statusCode   = $statusCode;
    }

    /**
     * @return null|mixed
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @return null|string
     */
    public function contentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $prefix
     * @return null|string
     * @throws InvalidArgumentException
     */
    public function headerLine($prefix)
    {
        $valueIsNotAvailable = (!isset($this->headerLines[$prefix]));

        if ($valueIsNotAvailable) {
            throw new InvalidArgumentException(
                'no headline available for prefix: "' . $prefix . '"'
            );
        }

        return $this->headerLines[$prefix];
    }

    /**
     * @return array
     */
    public function headerLines()
    {
        return $this->headerLines;
    }

    /**
     * @return null|string
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * @return null|int
     * @see: http://curl.haxx.se/libcurl/c/libcurl-errors.html
     */
    public function errorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return null|int
     */
    public function statusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function convertIntoAnArray()
    {
        return array(
                self::ARRAY_KEY_CONTENT         => $this->content,
                self::ARRAY_KEY_CONTENT_TYPE    => $this->contentType,
                self::ARRAY_KEY_ERROR           => $this->error,
                self::ARRAY_KEY_ERROR_CODE      => $this->errorCode,
                self::ARRAY_KEY_STATUS_CODE     => $this->statusCode
            );
    }
}
