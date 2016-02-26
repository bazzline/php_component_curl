<?php

namespace Net\Bazzline\Component\Curl\Request;

use Net\Bazzline\Component\Curl\Dispatcher\Dispatcher;
use Net\Bazzline\Component\Curl\Dispatcher\DispatcherInterface;
use Net\Bazzline\Component\Curl\FactoryInterface;
use Net\Bazzline\Component\Curl\HeaderLine\ContentTypeIsUtf8Form;
use Net\Bazzline\Component\Curl\HeaderLine\HeaderLineInterface;
use Net\Bazzline\Component\Curl\Option\Behaviour\SetTimeOutInSeconds;
use Net\Bazzline\Component\Curl\Option\OptionInterface;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;

class RequestFactory implements FactoryInterface
{
    /** @var DispatcherInterface */
    private $dispatcher;

    /**
     * @return mixed|Request
     */
    public function create()
    {
        $defaultHeaderLines = $this->createDefaultHeaderLines(
            $this->getDefaultRawHeaderLine(),
            $this->getDefaultHeaderLines()
        );

        $defaultOptions     = $this->createDefaultOptions(
            $this->getDefaultRawOptions(),
            $this->getDefaultOptions()
        );

        $request = new Request(
            $this->getDispatcher(),
            new Merge(),
            $defaultHeaderLines,
            $defaultOptions
        );

        return $request;
    }

    /**
     * @param DispatcherInterface $dispatcher
     */
    public function overwriteDispatcher(DispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @return DispatcherInterface
     */
    protected function getDispatcher()
    {
        $createDispatcher = !($this->dispatcher instanceof  DispatcherInterface);

        if ($createDispatcher) {
            $this->dispatcher = $this->getNewDispatcher();
        }

        return $this->dispatcher;
    }

    /**
     * @return DispatcherInterface
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
        return array();
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

    /**
     * @param array $rawHeaderLines
     * @param array|HeaderLineInterface[] $headerLines
     * @return array
     */
    private function createDefaultHeaderLines(array $rawHeaderLines, array $headerLines)
    {
        $defaultHeaderLines = $rawHeaderLines;

        foreach ($headerLines as $headerLine) {
            $defaultHeaderLines[] = $headerLine->line();
        }

        return $defaultHeaderLines;
    }

    /**
     * @param array $rawOptions
     * @param array|OptionInterface[] $options
     * @return array
     */
    private function createDefaultOptions(array $rawOptions, array $options)
    {
        $defaultOptions = $rawOptions;

        foreach ($options as $option) {
            $defaultOptions[$option->identifier()] = $option->value();
        }

        return $defaultOptions;
    }
}
