<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-08
 */
namespace Net\Bazzline\Component\Curl;

use Exception;
use Net\Bazzline\Component\Curl\HeadLine\HeadLineInterface;
use Net\Bazzline\Component\Curl\HeadLine\ContentTypeIsJson;
use Net\Bazzline\Component\Curl\Option\OptionInterface;
use Net\Bazzline\Component\Curl\ResponseBehaviour\ConvertJsonToArrayBehaviour;
use Net\Bazzline\Component\Curl\ResponseBehaviour\ResponseBehaviourInterface;
use RuntimeException;

class Builder
{
    const METHOD_DELETE = 0;
    const METHOD_GET    = 1;
    const METHOD_PATCH  = 2;
    const METHOD_POST   = 3;
    const METHOD_PUT    = 4;

    /** @var string */
    private $asJson;

    /** @var string */
    private $data;

    /** @var array|ResponseBehaviourInterface[] */
    private $defaultResponseBehaviours;

    /** @var int */
    private $method;

    /** @var array */
    private $parameters;

    /** @var Request */
    private $request;

    /** @var array|ResponseBehaviourInterface[] */
    private $responseBehaviours;

    /** @var string */
    private $url;

    /**
     * @param Request $request
     * @param array|ResponseBehaviourInterface[] $defaultResponseBehaviours
     */
    public function __construct(Request $request, array $defaultResponseBehaviours = array())
    {
        $this->defaultResponseBehaviours    = $defaultResponseBehaviours;
        $this->request                      = $request;
        $this->reset();
    }

    /**
     * @return Response
     * @throws Exception|RuntimeException
     */
    public function andFetchTheResponse()
    {
        $asJson     = $this->asJson;
        /** @var ResponseBehaviourInterface[] $behaviours */
        $behaviours = array_merge($this->responseBehaviours, $this->defaultResponseBehaviours);
        $data       = $this->data;
        $method     = $this->method;
        $parameters = $this->parameters;
        $request    = $this->request;
        $url        = $this->url;

        if ($asJson) {
            $data = json_encode($data);
        }

        switch ($method) {
            case self::METHOD_DELETE:
                $response = $request->delete($url, $parameters);
                break;
            case self::METHOD_GET:
                $response = $request->get($url, $parameters);
                break;
            case self::METHOD_PATCH:
                $response = $request->patch($url, $parameters, $data);
                break;
            case self::METHOD_POST:
                $response = $request->post($url, $parameters, $data);
                break;
            case self::METHOD_PUT:
                $response = $request->put($url, $parameters, $data);
                break;
            default:
                throw new RuntimeException(
                    'no http method set'
                );
        }

        foreach ($behaviours as $behaviour) {
            $response = $behaviour->behave($response);
        }

        return $response;
    }

    /**
     * @return $this
     */
    public function asJson()
    {
        $this->asJson = true;
        $this->request->addHeaderLine(new ContentTypeIsJson());
        $this->responseBehaviours = new ConvertJsonToArrayBehaviour();

        return $this;
    }

    /**
     * @param bool $alsoTheDefaults
     * @return $this
     */
    public function reset($alsoTheDefaults = false)
    {
        $this->asJson       = false;
        $this->data         = null;
        $this->parameters   = array();
        $this->request->reset($alsoTheDefaults);
        $this->url          = null;

        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function onTheUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function withTheData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param HeadLineInterface $line
     * @return $this
     */
    public function withTheHeaderLine(HeadLineInterface $line)
    {
        $this->request->addHeaderLine($line);

        return $this;
    }

    /**
     * @param OptionInterface $option
     * @return $this
     */
    public function withTheOption(OptionInterface $option)
    {
        $this->request->addOption($option);

        return $this;
    }

    /**
     * @param array $parameters
     * @return $this
     */
    public function withTheParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @param ResponseBehaviourInterface $behaviour
     * @return $this
     */
    public function withTheResponseBehaviour(ResponseBehaviourInterface $behaviour)
    {
        $this->responseBehaviours = $behaviour;

        return $this;
    }

    //@todo better nameing?
    //  callDelete
    /**
     * @return $this
     */
    public function useDelete()
    {
        $this->method = self::METHOD_DELETE;

        return $this;
    }

    /**
     * @return $this
     */
    public function useGet()
    {
        $this->method = self::METHOD_GET;

        return $this;
    }

    /**
     * @return $this
     */
    public function usePatch()
    {
        $this->method = self::METHOD_PATCH;

        return $this;
    }

    /**
     * @return $this
     */
    public function usePost()
    {
        $this->method = self::METHOD_POST;

        return $this;
    }

    /**
     * @return $this
     */
    public function usePut()
    {
        $this->method = self::METHOD_PUT;

        return $this;
    }
}