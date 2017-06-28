<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/28
 * Time: 11:52
 */

namespace Tests\Library;



class LibraryIncludeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function definesTheApiConnectorGlobalVariable()
    {
        include __DIR__ . '/../../../lib/cPanelHello.php';
        $this->assertTrue(isset($apiConnector));
    }
}
