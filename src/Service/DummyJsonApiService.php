<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class DummyJsonApiService
{
    private HttpClientInterface $client;
    private string $baseUrl;

    public function __construct(HttpClientInterface $client, string $baseUrl = 'https://dummyjson.com')
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

        return $response->toArray()['products'] ?? [];
    }

}
