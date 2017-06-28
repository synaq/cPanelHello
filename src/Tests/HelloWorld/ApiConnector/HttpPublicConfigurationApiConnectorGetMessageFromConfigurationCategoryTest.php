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
use Synaq\HttpClient\Response;

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

    /**
     * @test
     */
    public function returnsMessageReturnedByTheApi()
    {
            $this->client->shouldReceive('get')->andReturn($this->httpOkayResponseWithMessage('Some API Message'));
        $this->assertEquals('Some API Message', $this->connector->getMessageFromConfigurationCategory());
    }

    protected function setUp()
    {
        $this->client = m::mock(Client::class);
        $this->client->shouldReceive('get')->andReturn($this->httpOkayResponseWithMessage('An API Message'))->byDefault();
        $this->client->shouldIgnoreMissing();

        $this->connector = new HttpPublicConfigurationApiConnector($this->client);
    }

    private function httpOkayResponseWithMessage($message) {
        $raw = "HTTP/1.1 200 OK\r\n".
            "Server: nginx/1.10.1\r\n".
            "Transfer-Encoding: Identity\r\n".
            "Content-Type: application/json\r\n".
            "Date: Tue, 13 Jun 2017 14:00:03 GMT\r\n".
            "Connection: keep-alive\r\n".
            "X-Powered-By: PHP/5.5.30\r\n".
            "Cache-Control: private\r\n".
            "X-Cached: MISS\r\n\r\n".
            "{\"message\": \"$message\"}";

        return new Response($raw);
    }
}
