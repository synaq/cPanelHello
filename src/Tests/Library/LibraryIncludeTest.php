<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/28
 * Time: 11:52
 */

namespace Tests\Library;



use Synaq\HelloWorld\ApiConnector\PublicConfigurationApiConnectorInterface;

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

    /**
     * @test
     */
    public function assignsAnApiConnectorToTheApiConnectorGlobalVariable()
    {
        $apiConnector = null;
        include __DIR__ . '/../../../lib/cPanelHello.php';
        $this->assertInstanceOf(PublicConfigurationApiConnectorInterface::class, $apiConnector);
    }
}
