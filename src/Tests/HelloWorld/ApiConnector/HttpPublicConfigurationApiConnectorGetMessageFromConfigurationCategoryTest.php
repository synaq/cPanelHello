<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/22
 * Time: 08:58
 */

namespace Tests\HelloWorld\ApiConnector;

use Mockery as m;
use Synaq\HelloWorld\ApiConnector\HttpPublicConfigurationApiConnector;
use Synaq\HttpClient\Client;

class HttpPublicConfigurationApiConnectorGetMessageFromConfigurationCategoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Client | m\Mock
     */
    private $client;

    /**
     * @var HttpPublicConfigurationApiConnector
     */
    private $connector;

    /**
     * @test
     */
    public function callsGetOnHttpClientOnce()
    {
        $this->connector->getMessageFromConfigurationCategory();
        $this->client->shouldHaveReceived('get')->once();
    }

    /**
     * @test
     */
    public function callsGetOnTheStagingConfigurationApiEndpoint()
    {
        $this->connector->getMessageFromConfigurationCategory();
        $this->client->shouldHaveReceived('get')->with('https://sta-q.synaq.com/public-api/v1/configs/cPanelHello');
    }

    protected function setUp()
    {
        $this->client = m::mock(Client::class);
        $this->client->shouldIgnoreMissing();

        $this->connector = new HttpPublicConfigurationApiConnector($this->client);
    }
}
