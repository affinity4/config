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
namespace Affinity4\Config;

use Affinity4\Config\Loader\LoaderInterface;

/**
 * Config Class
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 1.0.0
 *
 * @package Affinity4\Config
 */
class Config
{
    /**
     * @var LoaderInterface
     */
    private $loader;
    
    /**
     * @var array
     */
    private $config;
    
    /**
     * Config Constructor
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since  1.0.0
     *
     * @param LoaderInterface $loader
     */
    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
        $this->config = $this->loader->output();
    }
    
    /**
     * Get array of values or filter down to specific key.
     *
     * Example:
     *  $config = new Affinity4\Config\Config(new Affinity4\Config\Loader\Yaml(__DIR__ . '/config.yml'));
     *  $config->get(); // ['db' => ['name' => 'test', 'user' => 'root', 'pass' => 'root', 'host' => '127.0.0.1']];
     *  $config->get('db name'); // test
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since  1.0.0
     *
     * @param null $key
     *
     * @return array|mixed
     * @throws \Exception
     */
    public function get($key = null)
    {
        if ($key === null) {
            return $this->config;
        } else {
            $keys = (strpos($key, ' ') !== false) ? explode(' ', $key) : [$key];
            
            $value = $this->config;
            
            foreach ($keys as $key) {
                if (!array_key_exists($key, $value)) {
                    throw new \Exception(sprintf("No such key `%s` in array `%s`", $key, $keys));
                }
                
                $value = $value[$key];
            }
            
            return $value;
        }
    }
}