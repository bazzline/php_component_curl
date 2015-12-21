<?php

namespace Net\Bazzline\Component\Curl\Request;

use Net\Bazzline\Component\Curl\Dispatcher\Dispatcher;
use Net\Bazzline\Component\Curl\FactoryInterface;
use Net\Bazzline\Component\Curl\HeaderLine\ContentTypeIsFormUtf8;
use Net\Bazzline\Component\Curl\HeaderLine\HeaderLineInterface;
use Net\Bazzline\Component\Curl\Option\Behaviour\SetTimeOutInSeconds;
use Net\Bazzline\Component\Curl\Option\OptionInterface;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;

class RequestFactory implements FactoryInterface
{
    /**
     * @return mixed|Request
     */
    public function create()
    {
        $request = new Request($this->getNewDispatcher(), new Merge());

        //demonstration of using an object as header line
        foreach ($this->getDefaultHeaderLines() as $headLine) {
            $request->addHeaderLine($headLine);
        }

        //demonstration of using strings as header lines
        foreach ($this->getDefaultRawHeaderLine() as $headLine) {
            $request->addRawHeaderLine($headLine);
        }

        //demonstration of using an object as option
        foreach ($this->getDefaultOptions() as $option) {
            $request->addOption($option);
        }

        //demonstration of using predefined constants
        foreach ($this->getDefaultRawOptions() as $key => $value) {
            $request->addRawOption($key, $value);
        }

        return $request;
    }

    /**
     * @return Dispatcher
     */
    protected function getNewDispatcher()
    {
        return new Dispatcher();
    }

    /**
     * @return array|HeaderLineInterface[]
     */
    protected function getDefaultHeaderLines()
    {
        return array(
            new ContentTypeIsFormUtf8()
        );
    }

    /**
     * @return array
     */
    protected function getDefaultRawHeaderLine()
    {
        return array();
    }

    /**
     * @return array|OptionInterface[]
     */
    protected function getDefaultOptions()
    {
        return array(
            new SetTimeOutInSeconds(10)
        );
    }

    /**
     * @return array
     */
    protected function getDefaultRawOptions()
    {
        return array(
            CURLOPT_AUTOREFERER     => true,
            CURLOPT_CONNECTTIMEOUT  => 5,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_USERAGENT       => 'net/bazzline curl component for php'
        );
    }
}
