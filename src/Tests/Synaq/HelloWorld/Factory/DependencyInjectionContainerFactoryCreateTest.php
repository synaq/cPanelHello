<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/28
 * Time: 09:12
 */

namespace Tests\Synaq\HelloWorld\Factory;

use Dice\Dice;
use Synaq\HelloWorld\ApiConnector\HttpPublicConfigurationApiConnector;
use Synaq\HelloWorld\ApiConnector\PublicConfigurationApiConnectorInterface;
use Synaq\HelloWorld\Factory\DependencyInjectionContainerFactory;

class DependencyInjectionContainerFactoryCreateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Dice
     */
    private $container;

    /**
     * @test
     */
    public function returnsDiceDependencyInjectionContainer()
    {
        $this->assertInstanceOf(Dice::class, $this->container);
    }

    /**
     * @test
     */
    public function configuresContainerToReturnHttpPublicConfigurationApiConnectorInstanceWhenAskedForInstanceOfPublicConfigurationApiConnectorInterface(
    ) {
        $connector = $this->container->create(PublicConfigurationApiConnectorInterface::class);
        $this->assertInstanceOf(HttpPublicConfigurationApiConnector::class, $connector);
    }

    protected function setUp()
    {
        $this->container = DependencyInjectionContainerFactory::create();
    }
}
