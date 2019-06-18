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
 * @author  Luke Watts <luke@affinity4.ie>
 *
 * @since   1.0.0
 *
 * @package Affinity4\Config\Loader
 */
class Yaml implements LoaderInterface
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
     * Yaml Constructor
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @param string $file_path
     */
    public function __construct(string $file_path)
    {
        $this->input(file_get_contents($file_path));
    }

    /**
     * Get raw Yaml content and convert to array using Symfony/Yaml
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @param string $file_contents
     */
    public function input(string $file_contents)
    {
        $this->file_contents = $file_contents;

        $this->parsed_content = (array) SymfonyYaml::parse($this->file_contents);
    }

    /**
     * Return php array of parsed Yaml content
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @return array
     */
    public function output(): array
    {
        return (array) $this->parsed_content;
    }
}
