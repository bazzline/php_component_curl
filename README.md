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

The current change log can be found [here](https://github.com/bazzline/php_component_curl/blob/master/CHANGELOG.md).

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

# Final Words

Star it if you like it :-). Add issues if you need it. Pull patches if you enjoy it. Write a blog entry if you use it. [Donate something](https://gratipay.com/~stevleibelt) if you love it :-].
