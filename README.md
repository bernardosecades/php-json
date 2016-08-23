# PHP JSON

[![Build Status](https://travis-ci.org/bernardosecades/php-json.svg?branch=master)](https://travis-ci.org/bernardosecades/php-json)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bernardosecades/php-json/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bernardosecades/php-json/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/bernardosecades/php-json/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bernardosecades/php-json/code-structure/master)
[![License](https://poser.pugx.org/bernardosecades/php-json/license)](https://packagist.org/packages/bernardosecades/php-json)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8e70a11b-7e0d-4683-8fab-68af1205b2a6/mini.png)](https://insight.sensiolabs.com/projects/8e70a11b-7e0d-4683-8fab-68af1205b2a6)


## Why?

Mainly to handle errors json encode/decode and encapsulate options to encode easily. 


## Usage

```php
use BernardoSecades\Json\Json;

...

Json::decode($value);
Json::encode($value);

```

Options in json encode:

```php
use BernardoSecades\Json\Json;
use BernardoSecades\Json\Option;
use BernardoSecades\Json\ArrayOption;

...

$options = new ArrayOption();
$options[] = Option::JSON_UNESCAPED_UNICODE(); // Use enum object
$options[] = Option::JSON_UNESCAPED_SLASHES();
$options[] = Option::JSON_NUMERIC_CHECK();

Json::encode($value, $options);

```

### Handle errors

```php
use BernardoSecades\Json\Json;
use BernardoSecades\Json\DecodeException;
use BernardoSecades\Json\EncodeException;

...

try {
    Json::decode($value);
} catch (DecodeException $exception) {
    // do something
}

// or

if (!Json::isValid($value)) {
   // do something
}

try {
    Json::encode($value);
} catch (EncodeException $exception) {
 // do something
}

```

Get info from Encode/Decode exception

```php
use BernardoSecades\Json\Json;
use BernardoSecades\Json\DecodeException;

...

try {
    Json::decode($value);
} catch (DecodeException $exception) {

    $errorMessage = sprintf('%s , json error code %d', 
        $exception->getMessage(), // see http://php.net/manual/en/function.json-last-error-msg.php
        $exception->getCode(),    // see http://php.net/manual/en/json.constants.php
    ); 

    $this->logger->error($errorMessage);
    // do something more
}

```

## Installation

```
composer require bernardosecades/php-json
```



