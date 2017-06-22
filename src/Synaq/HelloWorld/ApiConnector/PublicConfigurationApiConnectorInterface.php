<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/22
 * Time: 08:53
 */

namespace Synaq\HelloWorld\ApiConnector;


interface PublicConfigurationApiConnectorInterface
{
    public function getMessageFromConfigurationCategory();
}