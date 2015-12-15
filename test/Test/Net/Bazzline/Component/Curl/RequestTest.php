<?php
/**
 * @author: stev leibelt <artodeto@bazzline.net>
 * @since: 2015-12-14
 */

namespace Test\Net\Bazzline\Component\Curl;

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
            ->andReturn($response);

        $clonedRequest = clone $request;

        $clonedRequest->put($this->getUrl());
    }

    /**
     * @param string $method
     * @param array $headerLines
     * @param array $options
     * @return array
     */
    private function buildDispatcherOptions($method, array $headerLines, array $options)
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
