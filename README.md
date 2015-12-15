# Simple Curl Wrapper Component for PHP

This project aims to deliver an easy to use and free as in freedom object oriented php curl command component..

The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/bazzline/php_component_curl.png?branch=master)](http://travis-ci.org/bazzline/php_component_curl)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_curl.svg)](https://packagist.org/packages/net_bazzline/php_component_curl)

The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_curl/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_curl/)

The versioneye status is:
[![Dependency Status](https://www.versioneye.com/user/projects/553941560b24225ef6000002/badge.svg?style=flat)](https://www.versioneye.com/user/projects/553941560b24225ef6000002)

@todo
Take a look on [openhub.net](https://www.openhub.net/p/php_component_curl).

This component is not developed to replace [guzzle](http://docs.guzzlephp.org/en/latest/).

# Example

## By Using The Builder

```php
//it is always good to ship the component with a factory to easy up usage
use Net\Bazzline\Component\Curl\BuilderFactory;
use Net\Bazzline\Component\Curl\Option\Timeout;

$factory    = new BuilderFactory();
$builder    = $factory->create();
$url        = 'http://www.foo.bar';
$timeout    = new Timeout(10);  //set the timeout to 10 seconds

$response = $builder->usePost()
    ->onTheUrl($url)
    ->withTheData($data)
    ->withTheParameters(array('descendingOrderBy' => 'id'))
    //->withTheHeaderLine($headLine)    //add the headline you want
    ->withTheOption($timeout)
    //->withResponseModifier($modifier) //add the response modifier you want
    ->andFetchTheResponse();

echo 'content: ' . $response->content() . PHP_EOL;
echo 'content type: ' . $response->contentType() . PHP_EOL;
echo 'error:' . $response->error() . PHP_EOL;
echo 'error code:' . $response->errorCode() . PHP_EOL;
echo 'status code: ' . $response->statusCode() . PHP_EOL;
```

## By Using The Request

```php
//it is always good to ship the component with a factory to easy up usage
$factory    = new Net\Bazzline\Component\Curl\RequestFactory();
$request    = $factory->create();
$url        = 'http://www.foo.bar';

$response = $request->get($url);

echo 'content: ' . $response->content() . PHP_EOL;
echo 'content type: ' . $response->contentType() . PHP_EOL;
echo 'error:' . $response->error() . PHP_EOL;
echo 'error code:' . $response->errorCode() . PHP_EOL;
echo 'status code: ' . $response->statusCode() . PHP_EOL;
```

## Executable Examples

* [Delete Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_delete_request.php)
* [Get Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_delete_request.php)
* [Patch Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_patch_request.php)
* [Post Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_post_request.php)
* [Put Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_put_request.php)

# Terms

* [Dispatcher](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Dispatcher.php)
    * doing the curl request
    * if you want to use pure curl, use this class
* [Request](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Request.php)
    * object oriented approach reflecting the request
    * [HeadLine](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/HeadLine/HeadLineInterface.php)
        * object oriented http headers, start a pull request if you need more
    * [Options](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Option/OptionInterface.php)
        * object oriented curl options, start a pull request if you need more
    * Parameters
        * all the parameters you want to add to your url - they are urlencoded automatically
    * Url
        * the url of your endpoint
* [Response](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Response.php)
    * object oriented approach reflecting the response
    * [ResponseBehaviour](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/ResponseBehaviour/ResponseBehaviourInterface.php)
        * interface to interact with the response
            * either modify the response (by creating a new one)
            * change the flow by throwing an exception if the response does not fits your needs (as example)
* [Builder](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Builder.php)
    * provides a fluent interface to easy up using curl
    * it takes care of all :-)


# Install

## By Hand

    mkdir -p vendor/net_bazzline/php_component_curl
    cd vendor/net_bazzline/php_component_curl
    git clone https://github.com/bazzline/php_component_curl .

## With [Packagist](https://packagist.org/packages/net_bazzline/php_component_curl)

    composer composer require net_bazzline/php_component_curl:dev-master

# Links

* http://resttesttest.com/

## Other Components Available

* https://github.com/php-mod/curl
* https://github.com/anlutro/php-curl
* https://github.com/hamstar/curl
* https://github.com/jyggen/curl
* https://github.com/ixudra/Curl
* https://github.com/brodkinca/BCA-PHP-CURL
* https://github.com/miliqi/laravel-curl
* https://github.com/andrefigueira/Lib-Curl

# History

* upcomming
    * @todo
        * add [dispatcher](https://github.com/jyggen/curl/blob/master/src/Dispatcher.php) or HandlerGenerator/HandlerFactory
            * https://secure.php.net/manual/en/function.curl-init.php
            * https://secure.php.net/manual/en/function.curl-multi-init.php
        * add RequestModifier
            * e.g. for adding the JsonModifier which converts the data into a json, adds the fitting ContentType etc.
        * add tests
    * fixed issue in BasicAuthentication HeadLine
    * fixed issue in builder example
    * fixed linking to DispatcherInterface
    * fixed style in DispatcherInterface
    * started unit test for
        * request
* [0.2.0](https://github.com/bazzline/php_component_curl/tree/0.2.0) - released at 14.12.2015
    * fixed issue in [Response::contentType()](https://github.com/bazzline/php_component_curl/commit/42841811e848628539b088af894410524cd61a68)
    * fixed styles
    * added [dispatcher interface](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/DispatcherInterface.php)
    * added scrutinizer, travis-ci and version eye status
    * added support for scrutinizer and travis-ci
    * added support for url as optional argument in example scripts
    * added unit test for
        * response
* [0.1.2](https://github.com/bazzline/php_component_curl/tree/0.1.2) - released at 10.12.2015
    * adapted behaviour to support the "error" in the response
    * extended terms
* [0.1.1](https://github.com/bazzline/php_component_curl/tree/0.1.1) - released at 10.12.2015
    * add description to terms
    * add installation howto
    * add link to examples
* [0.1.0](https://github.com/bazzline/php_component_curl/tree/0.1.0) - released at 10.12.2015
    * initial plumber release
