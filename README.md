# Config

[![Build Status](https://travis-ci.org/affinity4/config.svg?branch=master)](https://travis-ci.org/affinity4/config) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/affinity4/config/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/affinity4/config/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/affinity4/config/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/affinity4/config/?branch=master)

Load config files from various formats to PHP arrays and easily retrieve deeply nested items

## Features

- Specify any Loader which implements Affinity4\Config\LoaderInterface
- Get entire array of values
- Get specific value using simple, readable pattern
 
## Installation
Affinity4/Config is available via composer:

`composer require affinity4/config`

or

```
{
    "require": {
        "affinity4/config": "^1.0"
    }
}
```

## Usage

Given the contents of `config.yml` are:

```
env: local
db:
    local:
        name: test
        user: root
        pass: root
        host: 127.0.0.1
```

Using the Affinity4 Yaml Loader:

```
$loader = new Affinity4\Config\Loader\Yaml(__DIR__ . '/config.yml');

$config = new Affinity4\Config\Config($loader);
```

Get complete array using the `get()` method without passing a key:

```
$config->get();
```

Would return:

```
[
    'env' => 'local',
    'db' => [
        'local' => [
            'name' => 'test',
            'user' => 'root',
            'pass' => 'root',
            'host' => '127.0.0.1',
        ]
    ]
]
```

Or get a specific value by specifying a the map to the nested key:

```
$config->get('db local name'); // test
```

## Tests

Run tests:

```
vendor/bin/phpunit
```

## Licence
(c) 2017 Luke Watts (Affinity4.ie)

This software is licensed under the MIT license. For the
full copyright and license information, please view the
LICENSE file that was distributed with this source code.

