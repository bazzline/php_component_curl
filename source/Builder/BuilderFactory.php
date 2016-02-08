<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl\Builder;

use Net\Bazzline\Component\Curl\Dispatcher\DispatcherInterface;
use Net\Bazzline\Component\Curl\FactoryInterface;
use Net\Bazzline\Component\Curl\Request\Request;
use Net\Bazzline\Component\Curl\Request\RequestFactory;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;

class BuilderFactory implements FactoryInterface
{
    /** @var DispatcherInterface */
    private $dispatcher;

    /** @var RequestFactory */
    private $factory;

    /**
     * @return Builder|mixed
     */
    public function create()
    {
        $builder = new Builder(
            $this->createRequestFromFactory(),
            new Merge()
        );

        return $builder;
    }

    /**
     * @param DispatcherInterface $dispatcher
     */
    public function overwriteDispatcher(DispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param RequestFactory $factory
     */
    public function overwriteRequestFactory(RequestFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Request
     */
    protected function createRequestFromFactory()
    {
        $dispatcher         = $this->dispatcher;
        $isInvalidFactory   = (!($this->factory instanceof RequestFactory));
        $isValidDispatcher  = ($dispatcher instanceof DispatcherInterface);

        if ($isInvalidFactory) {
            $this->factory  = new RequestFactory();
        }

        if ($isValidDispatcher) {
            $this->factory->overwriteDispatcher($dispatcher);
        }

        $factory = $this->factory;

        return $factory->create();
    }
}
