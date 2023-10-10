<?php

namespace nickurt\Oxxa\Api;

use nickurt\Oxxa\Client;

abstract class AbstractApi implements ApiInterface
{
    /** @var Client */
    public $client;

    /**
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $parameters
     * @return array
     */
    protected function request(array $parameters = [])
    {
        $parameters = array_merge([
            'apiuser' => $this->client->getHttpClient()->getOptions()['username'],
            'apipassword' => 'MD5'.md5($this->client->getHttpClient()->getOptions()['password'])
        ], $parameters);

        $parameters = ($this->client->getEnvironment() == 'local') ? array_merge(['test' => 'Y'], $parameters) : $parameters;

        $response = $this->client->getHttpClient()->get(
            $parameters
        );

        return $response;
    }
}
