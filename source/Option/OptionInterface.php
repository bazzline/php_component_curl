<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-08
 */
namespace Net\Bazzline\Component\Curl\Option;

interface OptionInterface
{
    /**
     * @return int
     */
    public function identifier();

    /**
     * @return mixed
     */
    public function value();
}