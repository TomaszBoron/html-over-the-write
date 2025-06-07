<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class StrapiApiService
{
    private HttpClientInterface $client;
    private string $baseUrl;

    public function __construct(HttpClientInterface $client, string $baseUrl = 'http://symfony_node:1337/api')
    {
        $this->client = $client;
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    /**
     *
     * @return array
     */
    public function getProducts(): array
    {
        $response = $this->client->request('GET', $this->baseUrl . '/products');

        return $response->toArray()['data'] ?? [];
    }

}
