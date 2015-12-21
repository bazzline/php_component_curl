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

    /**
     * @return Builder|mixed
     */
    public function create()
    {
        $builder = new Builder($this->getRequest(), new Merge());

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
     * @return Request
     */
    protected function getRequest()
    {
        $dispatcher         = $this->dispatcher;
        $factory            = new RequestFactory();
        $isValidDispatcher  = ($dispatcher instanceof DispatcherInterface);

        if ($isValidDispatcher) {
            $factory->overwriteDispatcher($dispatcher);
        }

        return $factory->create();
    }
}
