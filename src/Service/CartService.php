<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    private SessionInterface $session;
    private const CART_KEY = 'cart';
    private DummyJsonApiService $dummyJsonApiService;

    public function __construct(RequestStack $requestStack, DummyJsonApiService $dummyJsonApiService)
    {
        $this->session = $requestStack->getCurrentRequest()->getSession();
        $this->dummyJsonApiService = $dummyJsonApiService;
    }

    public function getCart(): array
    {
        return $this->session->get(self::CART_KEY, []);
    }

    public function addProduct(string $productId, int $quantity = 1): void
    {
        $cart = $this->getCart();

        $product = $this->dummyJsonApiService->getProductById($productId);
        if ($product !== null) {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }

        $this->session->set(self::CART_KEY, $cart);
    }

    public function removeProduct(string $productId): void
    {
        $cart = $this->getCart();

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $this->session->set(self::CART_KEY, $cart);
        }
    }

    public function clearCart(): void
    {
        $this->session->remove(self::CART_KEY);
    }
}
