<?php
$apiConnector = '';
require_once(__DIR__ . '/../vendor/autoload.php');
$container = \Synaq\HelloWorld\Factory\DependencyInjectionContainerFactory::create();
$apiConnector = $container->create(\Synaq\HelloWorld\ApiConnector\PublicConfigurationApiConnectorInterface::class);