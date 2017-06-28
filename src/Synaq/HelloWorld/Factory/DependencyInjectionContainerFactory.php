<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/28
 * Time: 09:11
 */

namespace Synaq\HelloWorld\Factory;


use Dice\Dice;
use Synaq\HelloWorld\ApiConnector\HttpPublicConfigurationApiConnector;
use Synaq\HelloWorld\ApiConnector\PublicConfigurationApiConnectorInterface;

class DependencyInjectionContainerFactory
{
    public static function create()
    {
        $container = new Dice();
        $container->addRule(PublicConfigurationApiConnectorInterface::class, [
            'instanceOf' => HttpPublicConfigurationApiConnector::class
        ]);

        return $container;
    }
}