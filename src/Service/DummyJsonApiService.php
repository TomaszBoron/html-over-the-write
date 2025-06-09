<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class DummyJsonApiService
{
    private HttpClientInterface $client;
    private string $baseUrl;
    private string $productsFile;
    private string $categoriesFile;
    private bool $useStaticData;

    public function __construct(
        HttpClientInterface $client,
        string $baseUrl = 'https://dummyjson.com',
        string $productsFile = '/var/www/html/assets/data/products.json',
        string $categoriesFile = '/var/www/html/assets/data/categories.json',
        bool $useStaticData = false
    ) {
        $this->client = $client;
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->productsFile = $productsFile;
        $this->categoriesFile = $categoriesFile;
        $this->useStaticData = $useStaticData;
    }

    private function readJsonFile(string $filePath): array
    {
        if (!file_exists($filePath)) {
            return [];
        }

        $json = file_get_contents($filePath);
        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    public function getProducts(): array
    {
        if ($this->useStaticData) {
            $data = $this->readJsonFile($this->productsFile);
            return $data['products'] ?? [];
        }

        $response = $this->client->request('GET', $this->baseUrl . '/products');
        return $response->toArray()['products'] ?? [];
    }

    public function getProductsCategory(): array
    {
        if ($this->useStaticData) {
            return $this->readJsonFile($this->categoriesFile);
        }

        $response = $this->client->request('GET', $this->baseUrl . '/products/categories');
        return $response->toArray() ?? [];
    }

    public function getProductsByCategory(?string $categoryName = null): array
    {
        if ($this->useStaticData) {
            $products = $this->getProducts();

            if ($categoryName === null) {
                return $products;
            }

            return array_values(array_filter($products, function ($product) use ($categoryName) {
                return isset($product['category']) && $product['category'] === $categoryName;
            }));
        }

        if ($categoryName !== null) {
            $url = $this->baseUrl . '/products/category/' . urlencode($categoryName);
            $response = $this->client->request('GET', $url);
            return $response->toArray()['products'] ?? [];
        }

        $response = $this->client->request('GET', $this->baseUrl . '/products');
        return $response->toArray()['products'] ?? [];
    }


    public function getProductById(string $id): ?array
    {
        if ($this->useStaticData) {
            $products = $this->getProducts();
            foreach ($products as $product) {
                if ((string)$product['id'] === (string)$id) {
                    return $product;
                }
            }
            return null;
        }

        $response = $this->client->request('GET', $this->baseUrl . '/products/' . $id);

        if ($response->getStatusCode() === 200) {
            return $response->toArray();
        }

        return null;
    }
}
