<?php

namespace Net\Bazzline\Component\Curl\Request;

use Net\Bazzline\Component\Curl\Dispatcher\Dispatcher;
use Net\Bazzline\Component\Curl\Dispatcher\DispatcherInterface;
use Net\Bazzline\Component\Curl\FactoryInterface;
use Net\Bazzline\Component\Curl\HeaderLine\ContentTypeIsFormUtf8;
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
        $request = new Request($this->getDispatcher(), new Merge());

        $request = $this->addDefaultHeaderLines($this->getDefaultHeaderLines(), $request);
        $request = $this->addDefaultRawHeaderLines($this->getDefaultRawHeaderLine(), $request);
        $request = $this->addDefaultOptions($this->getDefaultOptions(), $request);
        $request = $this->addDefaultRawOptions($this->getDefaultRawOptions(), $request);

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

    /**
     * @param array|HeaderLineInterface[] $headerLines
     * @param Request $request
     * @return Request
     */
    private function addDefaultHeaderLines(array $headerLines, Request $request)
    {
        //demonstration of using an object as header line
        foreach ($headerLines as $headLine) {
            $request->addHeaderLine($headLine);
        }

        return $request;
    }

    /**
     * @param array $headerLines
     * @param Request $request
     * @return Request
     */
    private function addDefaultRawHeaderLines(array $headerLines, Request $request)
    {
        //demonstration of using strings as header lines
        foreach ($headerLines as $headLine) {
            $request->addRawHeaderLine($headLine);
        }

        return $request;
    }

    /**
     * @param array|OptionInterface[] $options
     * @param Request $request
     * @return Request
     */
    private function addDefaultOptions(array $options, Request $request)
    {
        //demonstration of using an object as option
        foreach ($options as $option) {
            $request->addOption($option);
        }

        return $request;
    }

    /**
     * @param array $options
     * @param Request $request
     * @return Request
     */
    private function addDefaultRawOptions(array $options, Request $request)
    {
        //demonstration of using predefined constants
        foreach ($this->getDefaultRawOptions() as $key => $value) {
            $request->addRawOption($key, $value);
        }

        return $request;
    }
}
