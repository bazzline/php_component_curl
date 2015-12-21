<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl\Builder;

use Net\Bazzline\Component\Curl\FactoryInterface;
use Net\Bazzline\Component\Curl\Request\Request;
use Net\Bazzline\Component\Curl\Request\RequestFactory;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;

class BuilderFactory implements FactoryInterface
{
    /**
     * @return Builder|mixed
     */
    public function create()
    {
        $builder = new Builder($this->getRequest(), new Merge());

        return $builder;
    }

    /**
     * @return Request
     */
    protected function getRequest()
    {
        $factory = new RequestFactory();

        return $factory->create();
    }
}
