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
        "wakumaku/ip2c": "dev-master"
    }
}
```

Composer update:

```bash
$> composer update
```

## How to use it

```php
include vendor/autoload.php';

$ip2c = \Ip2c\Ip2cFactory::build();

$result = $ip2c->self();

echo "Status: " . $result->status() . "\n";
echo "Iso2: " . $result->iso2() . "\n";
echo "Iso3: " . $result->iso3() . "\n";
echo "Name: " . $result->name() . "\n";

```

Output:

```
    Status: 1
    Iso2: ES
    Iso3: ESP
    Name: Spain
```