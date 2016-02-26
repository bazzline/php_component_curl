<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl\Request;

use Net\Bazzline\Component\Curl\HeaderLine\ContentTypeIsUtf8Json;
use Net\Bazzline\Component\Curl\Option\Behaviour\SetTimeOutInSeconds;
use stdClass;
use Test\Net\Bazzline\Component\Curl\AbstractTestCase;

class RequestTest extends AbstractTestCase
{
    /**
     * @return array
     */
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
     * @return array
     */
    public function testCaseWithUrlParametersAndData()
    {
        $testCaseTemplates  = $this->testCaseWithUrlParameters();
        $testCases          = array();
        $object             = new stdClass();

        $object->bar = 'foo';
        $object->foo = 'bar';

        foreach ($testCaseTemplates as $name => $template) {
            $testCases[$name . ' without data'] = array(
                'parameters'    => $template['parameters'],
                'data'          => null,
                'url'           => $template['url'],
                'expected_url'  => $template['expected_url'],
                'expected_data' => null
            );
            $testCases[$name . ' with int as data'] = array(
                'parameters'    => $template['parameters'],
                'data'          => 42,
                'url'           => $template['url'],
                'expected_url'  => $template['expected_url'],
                'expected_data' => 42
            );
            $testCases[$name . ' with string as data'] = array(
                'parameters'    => $template['parameters'],
                'data'          => 'there is no foo without a bar',
                'url'           => $template['url'],
                'expected_url'  => $template['expected_url'],
                'expected_data' => 'there is no foo without a bar'
            );
            $testCases[$name . ' with array as data'] = array(
                'parameters'    => $template['parameters'],
                'data'          => array('there' => 'is', 'no' => 'foo', 'without' => 'a', 'bar'),
                'url'           => $template['url'],
                'expected_url'  => $template['expected_url'],
                'expected_data' => 'there=is&no=foo&without=a&0=bar'
            );
            $testCases[$name . ' with object as data'] = array(
                'parameters'    => $template['parameters'],
                'data'          => $object,
                'url'           => $template['url'],
                'expected_url'  => $template['expected_url'],
                'expected_data' => 'bar=foo&foo=bar'
            );
        }

        return $testCases;
    }

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
        $headerLine     = new ContentTypeIsUtf8Json();
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



    /**
     * @dataProvider testCaseWithUrlParametersAndData
     * @param array $parameters
     * @param mixed $data
     * @param string $url
     * @param string $expectedUrl
     * @param mixed $expectedData
     */
    public function testPatch(array $parameters, $data, $url, $expectedUrl, $expectedData)
    {
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $response   = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $expectedUrl,
                $this->buildDispatcherOptions(
                    'PATCH',
                    array(),
                    array(),
                    $expectedData
                )
            )
            ->andReturn($response)
            ->once();

        $request->patch($url, $parameters, $data);
    }



    /**
     * @dataProvider testCaseWithUrlParametersAndData
     * @param array $parameters
     * @param mixed $data
     * @param string $url
     * @param string $expectedUrl
     * @param mixed $expectedData
     */
    public function testPost(array $parameters, $data, $url, $expectedUrl, $expectedData)
    {
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $response   = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $expectedUrl,
                $this->buildDispatcherOptions(
                    'POST',
                    array(),
                    array(),
                    $expectedData
                )
            )
            ->andReturn($response)
            ->once();

        $request->post($url, $parameters, $data);
    }



    /**
     * @dataProvider testCaseWithUrlParametersAndData
     * @param array $parameters
     * @param mixed $data
     * @param string $url
     * @param string $expectedUrl
     * @param mixed $expectedData
     */
    public function testPut(array $parameters, $data, $url, $expectedUrl, $expectedData)
    {
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $response   = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $expectedUrl,
                $this->buildDispatcherOptions(
                    'PUT',
                    array(),
                    array(),
                    $expectedData
                )
            )
            ->andReturn($response)
            ->once();

        $request->put($url, $parameters, $data);
    }

    public function testRestWithoutResettingTheDefaults()
    {
        $dispatcher     = $this->getMockOfTheDispatcher();
        $request        = $this->getNewRequest($dispatcher, array(), array());
        $response       = $this->getNewResponse();

        $request->addRawOption('foo', 'bar');
        $request->reset();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions('PUT')
            )
            ->andReturn($response)
            ->once();

        $request->put($this->getUrl());
    }

    public function testRestWithResettingTheDefaults()
    {
        $dispatcher     = $this->getMockOfTheDispatcher();
        $request        = $this->getNewRequest($dispatcher, array('foo' => 'bar'), array());
        $response       = $this->getNewResponse();

        $request->reset(true);

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions('PUT')
            )
            ->andReturn($response)
            ->once();

        $request->put($this->getUrl());
    }
}
