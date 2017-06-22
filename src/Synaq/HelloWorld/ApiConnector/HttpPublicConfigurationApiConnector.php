<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/22
 * Time: 08:57
 */

namespace Synaq\HelloWorld\ApiConnector;


use Synaq\HttpClient\Client;

class HttpPublicConfigurationApiConnector implements PublicConfigurationApiConnectorInterface
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getMessageFromConfigurationCategory()
    {
        $this->client->get(null);
    }
}