<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-16
 */
namespace Test\Net\Bazzline\Component\Curl;

class BuilderTest extends AbstractTestCase
{
    public function testFetchTheResponse()
    {
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $builder    = $this->getNewBuilder($request);
        $response   = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions('PUT')
            )
            ->andReturn($response)
            ->once();

        $builder->onTheUrl($this->getUrl());
        $builder->usePut();

        $builder->andFetchTheResponse();
    }

    public function testFetchTheResponseAsJson()
    {
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $builder    = $this->getNewBuilder($request);
        $response   = $this->getNewResponse();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions(
                    'PUT',
                    array('Content-Type: application/json'),
                    array(),
                    json_encode(null)
                )
            )
            ->andReturn($response)
            ->once();

        $builder->asJson();
        $builder->onTheUrl($this->getUrl());
        $builder->usePut();

        $builder->andFetchTheResponse();
    }

    public function testFetchTheResponseWithBehaviours()
    {
        $behaviour  = $this->getMockOfTheBehaviour();
        $dispatcher = $this->getMockOfTheDispatcher();
        $request    = $this->getNewRequest($dispatcher);
        $builder    = $this->getNewBuilder($request);
        $response   = $this->getNewResponse();

        $behaviour->shouldReceive('behave')
            ->with($response)
            ->andReturn($response)
            ->once();

        $dispatcher->shouldReceive('dispatch')
            ->with(
                $this->getUrl(),
                $this->buildDispatcherOptions('PUT')
            )
            ->andReturn($response)
            ->once();

        $builder->onTheUrl($this->getUrl());
        $builder->usePut();
        $builder->withTheResponseBehaviour($behaviour);

        $builder->andFetchTheResponse();
    }
}