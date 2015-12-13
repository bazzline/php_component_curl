<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-12-10
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Net\Bazzline\Component\Curl\BuilderFactory;

$factory    = new BuilderFactory();
$builder    = $factory->create();
$url        = ($argc > 1) ? $argv[1] : 'https://httpbin.org/get';

$response = $builder->onTheUrl($url)
    ->usePost()
    ->andFetchTheResponse();

echo 'content: ' . $response->content() . PHP_EOL;
echo 'content type: ' . $response->contentType() . PHP_EOL;
echo 'error:' . $response->error() . PHP_EOL;
echo 'error code:' . $response->errorCode() . PHP_EOL;
echo 'status code: ' . $response->statusCode() . PHP_EOL;
