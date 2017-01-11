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
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    private $file;
    
    private $config;
    
    private $yaml_loader;
    
    public function setUp()
    {
        $this->file = __DIR__ . '/files/config.yml';
        $this->yaml_loader = new Yaml($this->file);
        
        $this->config = new Config($this->yaml_loader);
    }
    
    public function testGet()
    {
        $this->assertInternalType('array', $this->config->get());
        $this->assertArrayHasKey('env', $this->config->get());
        $this->assertEquals('local', $this->config->get('env'));
        $this->assertInternalType('array', $this->config->get('db local'));
        $this->assertArrayHasKey('name', $this->config->get('db local'));
        $this->assertEquals('test', $this->config->get('db local name'));
    }
}
