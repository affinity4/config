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
 * LoaderInterface Interface
 *
 * @author Luke Watts <luke@affinity4.ie>
 *
 * @since 1.0.0
 *
 * @package Affinity4\Config\Loader
 */
interface LoaderInterface
{
    /**
     * LoaderInterface Constructor
     *
     * Use this to convert you get a file
     * and run the input method to convert it to an array.
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @param string $file_path Path of file to convert to PHP array
     */
    public function __construct(string $file_path);

    /**
     * Converts input to array to be retrieved using output
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @param string $file_contents The raw file contents
     */
    public function input(string $file_contents);

    /**
     * Get the array output
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @return array A php array created from the input
     */
    public function output(): array;
}
