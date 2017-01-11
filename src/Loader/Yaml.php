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
namespace Affinity4\Config\Loader;

use Symfony\Component\Yaml\Yaml as SymfonyYaml;

/**
 * Yaml Class
 *
 * @package Affinity4\Config\Loader
 */
class Yaml implements LoaderInterface
{
    /**
     * @var
     */
    private $file_content;
    
    /**
     * @var
     */
    private $parsed_content;
    
    public function __construct($file)
    {
        $this->input(file_get_contents($file));
    }
    
    /**
     * Get raw Yaml content and convert to array using Symfony/Yaml
     *
     * @param $file_content
     */
    public function input($file_content)
    {
        $this->file_content = $file_content;
        
        $this->parsed_content = SymfonyYaml::parse($this->file_content);
    }
    
    /**
     * Return php array of parsed Yaml content
     *
     * @return array
     */
    public function output()
    {
        return $this->parsed_content;
    }
}