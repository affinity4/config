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
namespace Affinity4\Config\Exception;

/**
 * IOException Class
 *
 * @author Luke Watts <luke@affinity4.ie>
 *
 * @since  1.0.0
 *
 * @package Affinity4\Config\Exception
 */
class IOException extends \Exception
{
    /**
     * IOException Constructor
     *
     * @param string $message
     *
     * @author Luke Watts <luke@affinity4.ie>
     *
     * @since  1.0.0
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
