# ip2c - Ip to Country PHP library

[![Build Status](https://scrutinizer-ci.com/g/wakumaku/ip2c/badges/build.png?b=master)](https://scrutinizer-ci.com/g/wakumaku/ip2c/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/wakumaku/ip2c/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/wakumaku/ip2c/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wakumaku/ip2c/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wakumaku/ip2c/?branch=master)

Ip2c is a small php library to retrieve the country where an Ip comes from.

This library uses http://ip2c.org as a service.

## Installation

### Prerequisites

Ip2c requires PHP 5.3.3 or greater.

If you want to run the tests you'll need a greater one (>=5.5)

### Setup through composer

First, add Ip2c to the list of dependencies inside your `composer.json`:

```json
{
    "require-dev": {
        "wakumaku/prophecy": "~1.0"
    }
}
```

Composer update:

```bash
$> composer update
```

## How to use it

```php
include 'vendor/autoload.php';

$ip2c = \Ip2c\Ip2cFactory::build();

$result = array(
    'self' => $ip2c->self(),
    'ip'   => $ip2c->ip('74.125.224.72'),
    'dec'  => $ip2c->dec(1249763400),
);

print_r($result);
```
