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
 *
 * @since  1.1.0
 *
 * @package Affinity4\Config\Loader
 */
class Json implements LoaderInterface
{
    /**
     * @var string
     */
    private $file_contents;

    /**
     * @var array
     */
    private $parsed_content;

    /**
     * Json Constructor
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.1.0
     *
     * @param string $file_path
     */
    public function __construct($file_path)
    {
        $this->input(file_get_contents($file_path));
    }

    /**
     * Get raw JSON content and convert to array using json_decode
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.1.0
     *
     * @param string $file_contents
     */
    public function input(string $file_contents)
    {
        $this->file_contents = $file_contents;

        $this->parsed_content = json_decode($this->file_contents, true);
    }

    /**
     * Return php array of parsed JSON content
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.1.0
     *
     * @return array
     */
    public function output(): array
    {
        return (array) $this->parsed_content;
    }
}
