<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/28
 * Time: 09:12
 */

namespace Tests\Synaq\HelloWorld\Factory;

use Dice\Dice;
use Synaq\HelloWorld\Factory\DependencyInjectionContainerFactory;

class DependencyInjectionContainerFactoryCreateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnsDiceDependencyInjectionContainer()
    {
        $factory = new DependencyInjectionContainerFactory();
        $container = $factory->create();
        $this->assertInstanceOf(Dice::class, $container);
    }
}
