# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [Open]

### To Add

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

### To Change

## [Unreleased]

### Added

* added php 7.2 to the travis test

### Changed

* updated composer.json file and restricted php version to 5.6 as minimum

## [1.0.0](https://github.com/bazzline/php_component_curl/tree/1.0.0) - released at 2017-04-23

### Added

* support for php version 7.1

### Changed

* dropped support for php version below 5.6
* moved release history from the README.md into this dedicated CHANGELOG.md
* replaced "array()" notation with "[]"

## [0.15.1](https://github.com/bazzline/php_component_curl/tree/0.15.1) - released at 2017-03-29

### Changed

* moved phpunit dependency to 5.7

## [0.15.0](https://github.com/bazzline/php_component_curl/tree/0.15.0) - released at 2016-10-27

### Changed

* support to send data when calling http method DELETE

## [0.14.4](https://github.com/bazzline/php_component_curl/tree/0.14.4) - released at 2016-09-20

### Added

* [AcceptLanguate](https://github.com/bazzline/php_component_curl/blob/0.14.4/source/HeaderLine/AcceptLanguage.php) header line

## [0.14.3](https://github.com/bazzline/php_component_curl/tree/0.14.3) - released at 2016-09-19

### Added

* [AcceptEncoding](https://github.com/bazzline/php_component_curl/blob/0.14.3/source/HeaderLine/AcceptEncoding.php) header line
* [Custom](https://github.com/bazzline/php_component_curl/blob/0.14.3/source/HeaderLine/Custom.php) header line
* started more examples section

### Changed

* updated phpunit to 5.5.*

## [0.14.2](https://github.com/bazzline/php_component_curl/tree/0.14.2) - released at 2016-05-30

### Changed

* relaxed dependency to mockery

## [0.14.1](https://github.com/bazzline/php_component_curl/tree/0.14.1) - released at 2016-03-11

### Changed

* removed *.php* for examples and made them executable
* updated dependencies

## [0.14.0](https://github.com/bazzline/php_component_curl/tree/0.14.0) - released at 2016-02-26

### Changed

* removed default header "application/x-www-form-urlencoded; charset=UTF-8" and added new *ContentTypeUtf8Html*

## [0.13.0](https://github.com/bazzline/php_component_curl/tree/0.13.0) - released at 2016-02-17

### Changed

* fixed "ConverteJsonToArayBehaviour" by merging [pull request 3](https://github.com/bazzline/php_component_curl/pull/3)

## [0.12.0](https://github.com/bazzline/php_component_curl/tree/0.12.0) - released at 2016-02-08

### Added

* *curl_close($handler)* in default *Dispatcher*

### Changed

* fixed bug in *BuilderFactory::createRequestFromFactory()*
* fixed bug in *RequestFactory::create()*

## [0.11.0](https://github.com/bazzline/php_component_curl/tree/0.11.0) - released at 2016-02-08

* fixed major bug in *createRequestFromFactory* to *BuilderFactory*
* refactored internals of Builder::andFetchTheResponse()
* refactored internals of Request::execute()
* refactored internals of RequestFactory::create()

## [0.10.0](https://github.com/bazzline/php_component_curl/tree/0.10.0) - released at 08.02.2016

### Added

* public *overwriteRequestFactory()* to *BuilderFactory*

### Changed

* fixed broken links in the readme
* moved to *psr-4* autoloading
* removed dedicated integration test for php 5.3.3

## [0.9.1](https://github.com/bazzline/php_component_curl/tree/0.9.1) - released at 2016-01-14

### Changed

* updated dependencies
