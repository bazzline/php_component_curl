<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

use Net\Bazzline\Component\Curl\HeadLine\ContentTypeIsJson;
use Net\Bazzline\Component\Curl\Option\Timeout;

class RequestTest extends AbstractTestCase
{
    public function testClone()
    {
        $dispatcher     = $this->getMockOfTheDispatcher();
        $headerLines    = array(
            'foo: bar'
        );
        $options        = array(
            CURLOPT_AUTOREFERER => true
        );
        $request        = $this->getNewRequest($dispatcher, $headerLines, $options);
        $response       = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions('PUT', $headerLines, $options)
            )
            ->andReturn($response)
            ->once();

        $clonedRequest = clone $request;

        $clonedRequest->put($this->getUrl());
    }

    public function testAddHeaderLine()
    {
        $dispatcher     = $this->getMockOfTheDispatcher();
        $headerLine     = new ContentTypeIsJson();
        $request        = $this->getNewRequest($dispatcher, array(), array());
        $response       = $this->getNewResponse();

        $request->addHeaderLine($headerLine);

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions('PUT', array($headerLine->line()), array())
            )
            ->andReturn($response)
            ->once();

        $request->put($this->getUrl());
    }

    public function testAddOption()
    {
        $dispatcher     = $this->getMockOfTheDispatcher();
        $option         = new Timeout(__LINE__);
        $request        = $this->getNewRequest($dispatcher, array(), array());
        $response       = $this->getNewResponse();

        $request->addOption($option);

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions(
                    'PUT',
                    array(),
                    array(
                        $option->identifier() => $option->value()
                    )
                )
            )
            ->andReturn($response)
            ->once();

        $request->put($this->getUrl());
    }

    public function testAddRawHeaderLine()
    {
        $dispatcher     = $this->getMockOfTheDispatcher();
        $headerLine     = 'foo: bar';
        $request        = $this->getNewRequest($dispatcher, array(), array());
        $response       = $this->getNewResponse();

        $request->addRawHeaderLine($headerLine);

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions('PUT', array($headerLine), array())
            )
            ->andReturn($response)
            ->once();

        $request->put($this->getUrl());
    }

    public function testAddRawOption()
    {
        $dispatcher     = $this->getMockOfTheDispatcher();
        $request        = $this->getNewRequest($dispatcher, array(), array());
        $response       = $this->getNewResponse();

        $request->addRawOption('foo', 'bar');

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions(
                    'PUT',
                    array(),
                    array('foo' => 'bar')
                )
            )
            ->andReturn($response)
            ->once();

        $request->put($this->getUrl());
    }

    public function testCaseWithUrlParameters()
    {
        $url = $this->getUrl();

        return array(
            'without parameters'   =>  array(
                'parameters'    => array(),
                'url'           => $url,
                'expected_url'  => $url
            )
        );
    }



    /**
     * @dataProvider testCaseWithUrlParameters
     * @param array $parameters
     * @param $url
     * @param $expectedUrl
     */
    public function testGet(array $parameters, $url, $expectedUrl)
    {
$this->markTestIncomplete();
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $response   = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $expectedUrl,
                $this->buildDispatcherOptions('GET')
            )
            ->andReturn($response)
            ->once();

        $request->get($url, $parameters);
    }

    /*
    public function testCaseWithUrlParametersAndData()
    {
        return array(

        );
    }
    */

    /*
    public function testDelete(array $parameters, $url, $expectedUrl)
    {

    }

    public function testPatch(array $parameters, $url, $expectedUrl, $expectedData)
    {

    }

    public function testPost(array $parameters, $url, $expectedUrl, $expectedData)
    {

    }

    public function testPut(array $parameters, $url, $expectedUrl, $expectedData)
    {

    }
    */

    /**
     * @param string $method
     * @param array $headerLines
     * @param array $options
     * @return array
     */
    private function buildDispatcherOptions($method, array $headerLines = array(), array $options = array())
    {
        $headerLines[]      = 'X-HTTP-Method-Override: ' . $method; //@see: http://tr.php.net/curl_setopt#109634
        $dispatcherOptions  = $options;

        $dispatcherOptions[CURLOPT_CUSTOMREQUEST]   = $method;
        $dispatcherOptions[CURLOPT_HEADER]          = 1;
        $dispatcherOptions[CURLOPT_HTTPHEADER]      = $headerLines;
        $dispatcherOptions[CURLOPT_RETURNTRANSFER]  = true;

        return $dispatcherOptions;
    }
}
