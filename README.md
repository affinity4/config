# Config

Load config files from various formats to PHP arrays and easily retrieve deeply nested items

## Features

- Specify any Loader which implements Affinity4\Config\LoaderInterface
- Get entire array of values
- Get specific value using simple, readable pattern

## Installation

Affinity4/Config is available via composer:

```bash
composer require affinity4/config
```

## Usage

Given the contents of `config.yml` are:

```yaml
env: local
db:
    local:
        name: test
        user: root
        pass: root
        host: 127.0.0.1
```

Using the Affinity4 Yaml Loader:

```php
$loader = new Affinity4\Config\Loader\Yaml(__DIR__ . '/config.yml');

$config = new Affinity4\Config\Config($loader);
```

Get complete array using the `get()` method without passing a key:

```php
$config->get();
```

Would return:

```php
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

```php
$config->get('db local name'); // test
```

## Loaders

Affinity4/Config comes with these Loaders out of the box:

- Json
- Yaml
- Neon
- PHP

## Tests

Run tests:

```bash
vendor/bin/phpunit
```

## Licence

(c) 2017 Luke Watts (Affinity4.ie)

This software is licensed under the MIT license. For the
full copyright and license information, please view the
LICENSE file that was distributed with this source code.

