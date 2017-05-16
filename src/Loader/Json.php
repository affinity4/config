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

/**
 * Json Class
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since  1.1.0
 *
 * @package Affinity4\Config\Loader
 */
class Json implements LoaderInterface 
{
    /**
     * @var
     */
    private $file_content;
    
    /**
     * @var
     */
    private $parsed_content;
    
    /**
     * Json Constructor
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since  1.1.0
     *
     * @param string $file
     */
    public function __construct($file)
    {
        $this->input(file_get_contents($file));
    }
    
    /**
     * Get raw JSON content and convert to array using json_decode
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since  1.1.0
     *
     * @param $file_content
     */
    public function input($file_content)
    {
        $this->file_content = $file_content;
        
        $this->parsed_content = json_decode($this->file_content, true);
    }
    
    /**
     * Return php array of parsed JSON content
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since  1.1.0
     *
     * @return array
     */
    public function output()
    {
        return $this->parsed_content;
    }
}
