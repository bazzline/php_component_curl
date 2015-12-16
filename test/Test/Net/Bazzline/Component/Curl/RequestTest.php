<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

use Net\Bazzline\Component\Curl\HeadLine\ContentTypeIsJson;
use Net\Bazzline\Component\Curl\Option\Behaviour\SetTimeOutInSeconds;

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
        $option         = new SetTimeOutInSeconds(__LINE__);
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
            'with parameters'   =>  array(
                'parameters'    => array(),
                'url'           => $url,
                'expected_url'  => $url
            ),
            'with parameter parameter only'   =>  array(
                'parameters'    => array('key'),
                'url'           => $url,
                'expected_url'  => $url . '?0=key'
            ),
            'with parameter key only'   =>  array(
                'parameters'    => array('key' => null),
                'url'           => $url,
                'expected_url'  => $url
            ),
            'with one parameter'   =>  array(
                'parameters'    => array('key' => 'value'),
                'url'           => $url,
                'expected_url'  => $url . '?key=value'
            ),
            'with two parameter'   =>  array(
                'parameters'    => array(
                    'one' => 'value',
                    'two' => 'value'
                ),
                'url'           => $url,
                'expected_url'  => $url . '?one=value&two=value'
            ),
            'with multiple parameter'   =>  array(
                'parameters'    => array(
                    'one' => 'value',
                    'two' => 'value',
                    'three' => 'value'
                ),
                'url'           => $url,
                'expected_url'  => $url . '?one=value&two=value&three=value'
            ),
            'with nested parameter'   =>  array(
                'parameters'    => array(
                    'key' => array(
                        'one',
                        'two',
                        'three'
                    )
                ),
                'url'           => $url,
                'expected_url'  => $url . '?key%5B0%5D=one&key%5B1%5D=two&key%5B2%5D=three'
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



    /**
     * @dataProvider testCaseWithUrlParameters
     * @param array $parameters
     * @param $url
     * @param $expectedUrl
     */
    public function testDelete(array $parameters, $url, $expectedUrl)
    {
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $response   = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $expectedUrl,
                $this->buildDispatcherOptions('DELETE')
            )
            ->andReturn($response)
            ->once();

        $request->delete($url, $parameters);
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
