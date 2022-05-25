<?php
/**
 * This file is part of Affinity4/Config.
 *
 * (c) 2017 Luke Watts <luke@affinity4.ie>
 *
 * This software is licensed under the MIT license. For the
 * full copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */
namespace Affinity4\Test;

use Affinity4\Config\Config;
use Affinity4\Config\Loader\Yaml;
use Affinity4\Config\Loader\Json;
use Affinity4\Config\Loader\Neon;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Affinity4\Config\Config
 * @uses \Affinity4\Config\Loader\Yaml
 * @uses \Affinity4\Config\Loader\Json
 * @uses \Affinity4\Config\Loader\Neon
 */
class ConfigTest extends TestCase
{
    private function runTests(Config $Config)
    {
        $this->assertIsArray($Config->get());
        $this->assertArrayHasKey('env', $Config->get());
        $this->assertEquals('local', $Config->get('env'));
        $this->assertIsArray($Config->get('db local'));
        $this->assertArrayHasKey('name', $Config->get('db local'));
        $this->assertEquals('test', $Config->get('db local name'));
    }

    /**
     * @uses \Affinity4\Config\Loader\Yaml
     *
     * @return void
     */
    public function testConfigWithYamlLoader()
    {
        $file = __DIR__ . '/files/config.yml';
        $YamlLoader = new Yaml($file);
        $Config = new Config($YamlLoader);

        $this->runTests($Config);
    }

    /**
     * @uses \Affinity4\Config\Loader\Json
     *
     * @return void
     */
    public function testConfigWithJsonLoader()
    {
        $file       = __DIR__ . '/files/config.json';
        $JsonLoader = new Json($file);
        $Config     = new Config($JsonLoader);

        $this->runTests($Config);
    }

    /**
     * @uses \Affinity4\Config\Loader\Neon
     *
     * @return void
     */
    public function testConfigWithNeonLoader()
    {
        $file       = __DIR__ . '/files/config.neon';
        $NeonLoader = new Neon($file);
        $Config     = new Config($NeonLoader);

        $this->runTests($Config);
    }
}
