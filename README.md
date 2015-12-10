# Simple Curl Wrapper Component for PHP

This is not a component developed to replace [guzzle](http://docs.guzzlephp.org/en/latest/).

The main approach of this component is to create a free as in freedom basic curl object oriented component.

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
    ->withTheParameters(array('descendingOrderBy' => 'id')
    //->withTheHeaderLine($headLine)    //add the headline you want
    ->withTheOption($timeout)
    //->withResponseModifier($modifier) //add the response modifier you want
    ->andFetchTheResponse();

echo $response->content();
echo $response->contentType();
echo $response->errorCode();
echo $response->statusCode();
```

## By Using The Request

```php
//it is always good to ship the component with a factory to easy up usage
$factory    = new Net\Bazzline\Component\Curl\RequestFactory();
$request    = $factory->create();
$url        = 'http://www.foo.bar';

$response = $request->get($url);

echo $response->content();
echo $response->contentType();
echo $response->errorCode();
echo $response->statusCode();
```

# Terms

* Dispatcher
* Request
    * HeadLine
    * Options
    * Parameters
* Response
    * ResponseBehaviour
* Builder

# To do's

* add [dispatcher](https://github.com/jyggen/curl/blob/master/src/Dispatcher.php) or HandlerGenerator/HandlerFactory
    * https://secure.php.net/manual/en/function.curl-init.php
    * https://secure.php.net/manual/en/function.curl-multi-init.php
* add RequestModifier
    * e.g. for adding the JsonModifier which converts the data into a json, adds the fitting ContentType etc.
* add tests

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
