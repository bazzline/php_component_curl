# Simple Curl Wrapper Component for PHP

This project aims to deliver an easy to use and free as in freedom object oriented php curl command component.

The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/bazzline/php_component_curl.png?branch=master)](http://travis-ci.org/bazzline/php_component_curl)
[![Latest stable](https://img.shields.io/packagist/v/net_bazzline/php_component_curl.svg)](https://packagist.org/packages/net_bazzline/php_component_curl)

The scrutinizer status is:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_curl/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_curl/)

The versioneye status is:
[![Dependency Status](https://www.versioneye.com/user/projects/553941560b24225ef6000002/badge.svg?style=flat)](https://www.versioneye.com/user/projects/553941560b24225ef6000002)

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

/**
 * you can also use:
 *  //assuming that $dispatcher is an instance of DispatcherInterface
 *  //assuming that $requestFactory is an instance of RequestFactory
 *  $builder->overwriteDispatcher($dispatcher);
 *  $builder->overwriteRequestFactory($requestFactory);
 */

$response = $builder->usePost()
    ->onTheUrl($url)
    ->withTheData($data)
    ->withTheParameters(array('descendingOrderBy' => 'id'))
    ->withTheOption($timeout)
    ->andFetchTheResponse();

/** 
 * you can also use:
 *  $builder->withTheHeaderLine($headLine)    //add the headline you want
 *  $builder->withResponseModifier($modifier) //add the response modifier you want
 */

echo 'content: ' . $response->content() . PHP_EOL;
echo 'content type: ' . $response->contentType() . PHP_EOL;
echo 'error:' . $response->error() . PHP_EOL;
echo 'error code:' . $response->errorCode() . PHP_EOL;
echo 'head lines: ' . var_export($response->headerLines(), true) . PHP_EOL;
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
echo 'head lines: ' . var_export($response->headerLines(), true) . PHP_EOL;
echo 'status code: ' . $response->statusCode() . PHP_EOL;
```

## Executable Examples

* [Delete Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_delete_request)
* [Get Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_delete_request)
* [Patch Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_patch_request)
* [Post Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_post_request)
* [Put Request](https://github.com/bazzline/php_component_curl/blob/master/example/make_a_put_request)

## More Examples

### Post Request With Basic Authentication

```
//begin of runtime environments
$factory        = new BuilderFactory();
$builder        = $factory->create();
$data           = array(
    'there'     => 'is',
    'no'        => 'foo',
    'without'   => 'a bar'
);
$password       = '<super secret password>';
$username       = 'foo@bar.ru';
$url            = 'https://foo.bar.ru/api/my/rest/endpoint/v1';
//end of runtime environments

//begin building the request
$builder->asJson();
$builder->onTheUrl($url);
$builder->withTheData($data);
$builder->withTheOption(new SetBasicAuthentication());
$builder->withTheOption(new SetUsernameAndPassword($username, $password));
$builder->usePost();
//end building the request

$request = $builder->andFetchTheResponse();
echo PHP_EOL . 'dumping the request' . PHP_EOL;
var_dump($request);
```

# Terms

* [Dispatcher](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Dispatcher/Dispatcher.php)
    * doing the curl request
    * if you want to use pure curl, use this class
* [Request](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Request/Request.php)
    * object oriented approach reflecting the request
    * [HeadLine](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/HeadLine/HeadLineInterface.php)
        * object oriented [http headers](https://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html) ([list](https://en.wikipedia.org/wiki/List_of_HTTP_header_fields) of available headers), start a pull request if you need more
    * [Options](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Option/OptionInterface.php)
        * object oriented curl options, start a pull request if you need more
    * Parameters
        * all the parameters you want to add to your url - they are urlencoded automatically
    * Url
        * the url of your endpoint
* [Response](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Response/Response.php)
    * object oriented approach reflecting the response
    * [ResponseBehaviour](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/ResponseBehaviour/ResponseBehaviourInterface.php)
        * interface to interact with the response
            * either modify the response (by creating a new one)
            * change the flow by throwing an exception if the response does not fits your needs (as example)
* [Builder](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Builder/Builder.php)
    * provides a fluent interface to easy up using curl
    * it takes care of all :-)

# Not Available Curl Options

In general, the php version is limiting the available [curl options](http://php.net/manual/en/curl.constants.php).
Furthermore, some options are not implemented because of their hardcoded usage in the *Response* or the *Dispatcher* (you can set it but they would be overwritten).

This options are:

* used in the *Request*
    * CURLOPT_CUSTOMREQUEST
    * CURLOPT_HTTPHEADER
    * CURLOPT_POSTFIELDS
* used in the *Dispatcher*
    * CURLINFO_HEADER_OUT
    * CURLOPT_HEADERFUNCTION
    * CURLOPT_RETURNTRANSFER

If you want to change this, you either have to extend the existing *Request* or *Dispatcher* object.

# Install

## By Hand

```
mkdir -p vendor/net_bazzline/php_component_curl
cd vendor/net_bazzline/php_component_curl
git clone https://github.com/bazzline/php_component_curl .
```

## With [Packagist](https://packagist.org/packages/net_bazzline/php_component_curl)

```
composer require net_bazzline/php_component_curl:dev-master
```

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
        * to discuss
            * add [dispatcher](https://github.com/jyggen/curl/blob/master/src/Dispatcher.php) or HandlerGenerator/HandlerFactory
                * https://secure.php.net/manual/en/function.curl-init.php
                * https://secure.php.net/manual/en/function.curl-multi-init.php
            * add RequestModifier
                * e.g. for adding the JsonModifier which converts the data into a json, adds the fitting ContentType etc.
            * add support for parallel request execution like in the [stil/curl](https://github.com/stil/curl-easy) library
            * replace current dispatcher and logging dispatcher strategy with an event driven approach (currently only needed for logging)?
        * create Request Data Domain Object
        * create Request Options Domain Object
* [0.15.0](https://github.com/bazzline/php_component_curl/tree/0.15.0) - released at 27.10.2016
    * added support to send data when calling http method DELETE
* [0.14.4](https://github.com/bazzline/php_component_curl/tree/0.14.4) - released at 20.09.2016
    * added [AcceptLanguate](https://github.com/bazzline/php_component_curl/blob/0.14.4/source/HeaderLine/AcceptLanguage.php) header line
* [0.14.3](https://github.com/bazzline/php_component_curl/tree/0.14.3) - released at 19.09.2016
    * added [AcceptEncoding](https://github.com/bazzline/php_component_curl/blob/0.14.3/source/HeaderLine/AcceptEncoding.php) header line
    * added [Custom](https://github.com/bazzline/php_component_curl/blob/0.14.3/source/HeaderLine/Custom.php) header line
    * started more examples section
    * updated phpunit to 5.5.*
* [0.14.2](https://github.com/bazzline/php_component_curl/tree/0.14.2) - released at 30.05.2016
    * relaxed dependency to mockery
* [0.14.1](https://github.com/bazzline/php_component_curl/tree/0.14.1) - released at 11.03.2016
    * removed *.php* for examples and made them executable
    * updated dependencies
* [0.14.0](https://github.com/bazzline/php_component_curl/tree/0.14.0) - released at 26.02.2016
    * removed default header "application/x-www-form-urlencoded; charset=UTF-8" and added new *ContentTypeUtf8Html*
* [0.13.0](https://github.com/bazzline/php_component_curl/tree/0.13.0) - released at 17.02.2016
    * fixed "ConverteJsonToArayBehaviour" by merging [pull request 3](https://github.com/bazzline/php_component_curl/pull/3)
* [0.12.0](https://github.com/bazzline/php_component_curl/tree/0.12.0) - released at 08.02.2016
    * added *curl_close($handler)* in default *Dispatcher*
    * fixed bug in *BuilderFactory::createRequestFromFactory()*
    * fixed bug in *RequestFactory::create()*
* [0.11.0](https://github.com/bazzline/php_component_curl/tree/0.11.0) - released at 08.02.2016
    * fixed major bug in *createRequestFromFactory* to *BuilderFactory*
    * refactored internals of Builder::andFetchTheResponse()
    * refactored internals of Request::execute()
    * refactored internals of RequestFactory::create()
* [0.10.0](https://github.com/bazzline/php_component_curl/tree/0.10.0) - released at 08.02.2016
    * added public *overwriteRequestFactory()* to *BuilderFactory*
    * fixed broken links in the readme
    * moved to *psr-4* autoloading
    * removed dedicated integration test for php 5.3.3
* [0.9.1](https://github.com/bazzline/php_component_curl/tree/0.9.1) - released at 14.01.2016
    * updated dependencies
* [0.9.0](https://github.com/bazzline/php_component_curl/tree/0.9.0) - released at 05.01.2016
    * renamed *EnableSslVerifyPeer* to *DisableSslVerifyPeer*
    * renamed *SetSslVerifyHost* to *DisableSslVerifyHost*
* [0.8.0](https://github.com/bazzline/php_component_curl/tree/0.8.0) - released at 05.01.2016
    * *Response::headerLine()* is now throwing an *\InvalidArgumentException* instead of returning *null* when a not existing *$prefix* is provided
* [0.7.0](https://github.com/bazzline/php_component_curl/tree/0.7.0) - released at 21.12.2015
    * added *overwriteDispatcher* method into *BuilderFactory* and *RequestFactory*
    * created *LoggingDispatcher* (basic standard out logging - you can overwrite this behaviour)
    * implemented usage of *LoggingDispatcher* in the examples
    * moved *Builder* into own namespace
    * moved *Dispatcher* into own namespace
    * moved *Request* into own namespace
    * moved *Response* into own namespace
    * refactored *RequestFactory* by extracting all header lines or options into protected methods
    * renamed *HeadLine* into *HeaderLine*
* [0.6.1](https://github.com/bazzline/php_component_curl/tree/0.6.1) - released at 18.12.2015
    * added *Builder::withTheRawHeaderLine()* and *Builder::withTheRawOption()*
* [0.6.0](https://github.com/bazzline/php_component_curl/tree/0.6.0) - released at 18.12.2015
    * added *Not Available Curl Options* section in the readme
    * moved setting of curl option "CURLOPT_RETURNTRANSFER" from *Request* into the default *Dispatcher*
    * rearranged *Response* constructor parameters
* [0.5.0](https://github.com/bazzline/php_component_curl/tree/0.5.0) - released at 17.12.2015
    * added *Response::headerLines()* and *Response::headerLine($prefix)* and removed header output from the content
* [0.4.1](https://github.com/bazzline/php_component_curl/tree/0.4.1) - released at 16.12.2015
    * add Request::options(), Request::trace() and Request::head()
    * fixed [RequestFactory](https://github.com/bazzline/php_component_curl/commit/82ab3e8a8a1f3c83f8bb50634cf5cba007e223a3)
* [0.4.0](https://github.com/bazzline/php_component_curl/tree/0.4.0) - released at 16.12.2015
    * added unit test for
        * Builder
        * ConvertJsonToArrayBehaviour
        * ThrowRuntimeExceptionIfStatusCodeIsAboveTheLimitBehaviour
    * fixed issue in Builder
* [0.3.0](https://github.com/bazzline/php_component_curl/tree/0.3.0) - released at 16.12.2015
    * fixed issue in BasicAuthentication HeadLine
    * fixed issue in builder example
    * fixed issue in Request when dealing with data that is not an array
    * fixed linking to DispatcherInterface
    * fixed style in DispatcherInterface
    * added unit test for
        * request
    * added curl options
* [0.2.0](https://github.com/bazzline/php_component_curl/tree/0.2.0) - released at 14.12.2015
    * fixed issue in [Response::contentType()](https://github.com/bazzline/php_component_curl/commit/42841811e848628539b088af894410524cd61a68)
    * fixed styles
    * added [dispatcher interface](https://github.com/bazzline/php_component_curl/blob/master/source/Net/Bazzline/Component/Curl/Dispatcher/DispatcherInterface.php)
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

# Final Words

Star it if you like it :-). Add issues if you need it. Pull patches if you enjoy it. Write a blog entry if you use it. [Donate something](https://gratipay.com/~stevleibelt) if you love it :-].
