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

    /**
     *
     * @return array
     */
    public function getProductsCategory(): array
    {
        $response = $this->client->request('GET', $this->baseUrl . '/products/categories');

        return $response->toArray() ?? [];
    }

    /**
     *
     * @return array
     */
    public function getProductsByCategory(?string $categoryName = null): array
    {
        $url = $this->baseUrl . '/products/category';

        if ($categoryName !== null) {
            $url .= '/' . urlencode($categoryName);
        }

        $response = $this->client->request('GET', $url);

        return $response->toArray()['products'] ?? [];
    }

    /**
     *
     * @return array|null
     */
    public function getProductById(string $id): ?array
    {
        $response = $this->client->request('GET', $this->baseUrl . '/products/' . $id);

        if ($response->getStatusCode() === 200) {
            return $response->toArray();
        }

        return null;
    }

}
