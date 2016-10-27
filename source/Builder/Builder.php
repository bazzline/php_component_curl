<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-08
 */
namespace Net\Bazzline\Component\Curl\Builder;

use Exception;
use Net\Bazzline\Component\Curl\HeaderLine\HeaderLineInterface;
use Net\Bazzline\Component\Curl\HeaderLine\ContentTypeIsUtf8Json;
use Net\Bazzline\Component\Curl\Option\OptionInterface;
use Net\Bazzline\Component\Curl\Request\Request;
use Net\Bazzline\Component\Curl\Response\Response;
use Net\Bazzline\Component\Curl\ResponseBehaviour\ConvertJsonToArrayBehaviour;
use Net\Bazzline\Component\Curl\ResponseBehaviour\ResponseBehaviourInterface;
use Net\Bazzline\Component\Toolbox\HashMap\Merge;
use RuntimeException;

class Builder
{
    const METHOD_DELETE = 0;
    const METHOD_GET    = 1;
    const METHOD_PATCH  = 2;
    const METHOD_POST   = 3;
    const METHOD_PUT    = 4;

    /** @var boolean */
    private $asJson;

    /** @var null|string|array */
    private $data;

    /** @var array|ResponseBehaviourInterface[] */
    private $defaultResponseBehaviours;

    /** @var Merge */
    private $merge;

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
     * @param Merge $merge
     * @param array|ResponseBehaviourInterface[] $defaultResponseBehaviours
     */
    public function __construct(Request $request, Merge $merge, array $defaultResponseBehaviours = array())
    {
        $this->defaultResponseBehaviours    = $defaultResponseBehaviours;
        $this->merge                        = $merge;
        $this->request                      = $request;
        $this->reset();
    }

    /**
     * @return Response
     * @throws Exception|RuntimeException
     */
    public function andFetchTheResponse()
    {
        //begin of dependencies
        $asJson     = $this->asJson;
        $merge      = $this->merge;
        $data       = $this->data;
        $method     = $this->method;
        $parameters = $this->parameters;
        $request    = $this->request;
        $url        = $this->url;
        //end of dependencies

        //begin of business logic
        /** @var ResponseBehaviourInterface[] $behaviours */
        $behaviours = $merge($this->responseBehaviours, $this->defaultResponseBehaviours);
        $data       = $this->convertToJsonIfNeeded($data, $asJson);
        $response   = $this->fetchResponseFromRequestOrThrowRuntimeException(
            $method,
            $request,
            $url,
            $parameters,
            $data
        );
        $response   = $this->applyBehaviours($behaviours, $response);
        //end of business logic

        return $response;
    }

    /**
     * @return $this
     */
    public function asJson()
    {
        $this->asJson = true;
        $this->request->addHeaderLine(new ContentTypeIsUtf8Json());
        $this->responseBehaviours[] = new ConvertJsonToArrayBehaviour();

        return $this;
    }

    /**
     * @param bool $alsoTheDefaults
     * @return $this
     */
    public function reset($alsoTheDefaults = false)
    {
        $this->asJson               = false;
        $this->data                 = null;
        $this->parameters           = array();
        $this->request->reset($alsoTheDefaults);
        $this->responseBehaviours   = array();
        $this->url                  = null;

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
     * @param null|string|array $data
     * @return $this
     */
    public function withTheData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param HeaderLineInterface $line
     * @return $this
     */
    public function withTheHeaderLine(HeaderLineInterface $line)
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
     * @param string $line
     * @return $this
     */
    public function withTheRawHeaderLine($line)
    {
        $this->request->addRawHeaderLine($line);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function withTheRawOption($key, $value)
    {
        $this->request->addRawOption($key, $value);

        return $this;
    }

    /**
     * @param ResponseBehaviourInterface $behaviour
     * @return $this
     */
    public function withTheResponseBehaviour(ResponseBehaviourInterface $behaviour)
    {
        $this->responseBehaviours[] = $behaviour;

        return $this;
    }

    //@todo better naming?
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

    /**
     * @param array|ResponseBehaviourInterface[] $behaviours
     * @param Response $response
     * @return Response
     */
    private function applyBehaviours(array $behaviours, Response $response)
    {
        foreach ($behaviours as $behaviour) {
            $response = $behaviour->behave($response);
        }

        return $response;
    }

    /**
     * @param mixed $data
     * @param boolean $convertIt
     * @return mixed
     */
    private function convertToJsonIfNeeded($data, $convertIt)
    {
        return ($convertIt) ? json_encode($data) : $data;
    }

    /**
     * @param string $method
     * @param Request $request
     * @param string $url
     * @param array $parameters
     * @param mixed $data
     * @return Response
     * @throws RuntimeException
     */
    private function fetchResponseFromRequestOrThrowRuntimeException($method, Request $request, $url, array $parameters, $data)
    {
        switch ($method) {
            case self::METHOD_DELETE:
                $response = $request->delete($url, $parameters, $data);
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

        return $response;
    }
}
