<?php
/**
 * This file is part of Affinity4/Config.
 *
 * (c) 2019 Luke Watts <luke@affinity4.ie>
 *
 * This software is licensed under the MIT license. For the
 * full copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */
namespace Affinity4\Config\Loader;

use Nette\Neon\Neon as NetteNeon;

/**
 * Neon Loader
 *
 * @author  Luke Watts <luke@affinity4.ie>
 *
 * @since   1.2.0
 *
 * @package Affinity4\Config\Loader
 */
class Neon implements LoaderInterface
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
     * Neon Constructor
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.2.0
     *
     * @param string $file_path
     */
    public function __construct(string $file_path)
    {
        $this->input(\file_get_contents($file_path));
    }

    /**
     * Get raw Neon content and convert to array using Nette\Neon\Neon
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.2.0
     *
     * @param string $file_contents
     */
    public function input(string $file_contents)
    {
        $this->file_contents = $file_contents;

        $this->parsed_content = (array) NetteNeon::decode($this->file_contents);
    }

    /**
     * Return php array of parsed Neon content
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.2.0
     *
     * @return array
     */
    public function output(): array
    {
        return (array) $this->parsed_content;
    }
}