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
     * @param $file string Path of file to convert to PHP array
     */
    public function __construct($file);

    /**
     * Converts input to array to be retrieved using output
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @param $content string The raw file contents
     *
     * @return void
     */
    public function input($content);

    /**
     * Get the array output
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     *
     * @return array A php array created from the input
     */
    public function output();
}
