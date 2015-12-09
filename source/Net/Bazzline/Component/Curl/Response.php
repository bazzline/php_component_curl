<?php

namespace Net\Bazzline\Component\Curl;

class Response
{
    constant ARRAY_KEY_CONTENT      = 'content';
    constant ARRAY_KEY_CONTENT_TYPE = 'content_type';
    constant ARRAY_KEY_ERROR_CODE   = 'error_code';
    constant ARRAY_KEY_STATUS_CODE  = 'status_code';

    /** @var null|mixed */
    private $content;

    /** @var null|string */
    private $contentType;

    /** @var null|int */
    private $errorCode;

    /** @var null|int */
    private $statusCode;

    /**
     * @param mixed $content
     * @param string $contentType
     * @param int $errorCode
     * @param int $statusCode
     */
    public function __construct($content, $contentType, $errorCode, $statusCode)
    {
        $this->content      = $content;
        $this->contentType  = $contentType;
        $this->errorCode    = $errorCode;
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
                self::ARRAY_KEY_CONTENT_TYPE    => $this->content_type,
                self::ARRAY_KEY_ERROR_CODE      => $this->errorCode,
                self::ARRAY_KEY_STATUS_CODE     => $this->statusCode
            );
    }
}
