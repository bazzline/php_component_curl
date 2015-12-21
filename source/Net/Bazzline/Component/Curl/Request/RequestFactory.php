<?php

namespace Net\Bazzline\Component\Curl\Request;

use Net\Bazzline\Component\Curl\FactoryInterface;
use Net\Bazzline\Component\Curl\HeadLine\ContentTypeIsFormUtf8;
use Net\Bazzline\Component\Curl\Option\Behaviour\SetTimeOutInSeconds;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;

class RequestFactory implements FactoryInterface
{
    /**
     * @return mixed|Request
     */
    public function create()
    {
        $request = new Request(new Dispatcher(), new Merge());

        $request->addHeaderLine(new ContentTypeIsFormUtf8());

        //demonstration of using an object as option
        $request->addOption(new SetTimeOutInSeconds(10));

        //demonstration of using predefined constants
        $request->addRawOption(CURLOPT_AUTOREFERER, true);
        $request->addRawOption(CURLOPT_CONNECTTIMEOUT, 5);
        $request->addRawOption(CURLOPT_FOLLOWLOCATION, true);
        $request->addRawOption(CURLOPT_MAXREDIRS, 10);
        $request->addRawOption(CURLOPT_USERAGENT, 'net/bazzline curl component for php');

        return $request;
    }
}
