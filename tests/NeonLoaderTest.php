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

use Affinity4\Config\Loader\Neon;

class NeonLoaderTest extends \PHPUnit\Framework\TestCase
{
    private $neon_loader;

    public function setUp()
    {
        $this->neon_loader = new Neon(__DIR__ . '/files/config.neon');
    }

    public function testOutput()
    {
        $expected = [
            'env'   => 'local',
            'debug' => true,
            'db'    => [
                'local' => [
                    'name'    => 'test',
                    'user'    => 'root',
                    'pass'    => 'root',
                    'host'    => '127.0.0.1',
                    'driver'  => 'mysql_pdo',
                    'charset' => 'utf8',
                    'collate' => 'utf8_general_ci'
                ]
            ]
        ];

        $this->assertInternalType('array', $this->neon_loader->output());
        $this->assertEquals($expected, $this->neon_loader->output());
    }
}
