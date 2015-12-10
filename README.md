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

# Terms

* Dispatcher
* Request
    * HeadLine
    * Options
    * Parameters
* Response
    * ResponseBehaviour
* Builder

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
    @todo
        * add [dispatcher](https://github.com/jyggen/curl/blob/master/src/Dispatcher.php) or HandlerGenerator/HandlerFactory
            * https://secure.php.net/manual/en/function.curl-init.php
            * https://secure.php.net/manual/en/function.curl-multi-init.php
        * add RequestModifier
            * e.g. for adding the JsonModifier which converts the data into a json, adds the fitting ContentType etc.
        * add tests
        * add description to terms
        * add link to examples
* [0.1.0](https://github.com/bazzline/php_component_curl/tree/0.1.0) - released at 10.12.2015
    * initial plumber release
