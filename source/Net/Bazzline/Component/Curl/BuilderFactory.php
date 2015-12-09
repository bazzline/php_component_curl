<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-09
 */
namespace Net\Bazzline\Component\Curl;

class BuilderFactory implements FactoryInterface
{
    /**
     * @return mixed|Builder
     */
    public function create()
    {
        $builder = new Builder($this->getRequest());

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