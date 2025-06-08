<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CartController extends AbstractController
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        $cartItems = $this->cartService->getCart();

        return $this->render('cart/index.html.twig', [
            'cartItems' => $cartItems,
        ]);
    }

    #[Route('/cart/add', name: 'app_cart_add')]
    public function add(Request $request): Response
    {
        $productId = $request->query->get('productId');
        $quantity = max(1, (int)$request->query->get('quantity', 1));

        if (!$productId) {
            return $this->redirectToRoute('app_cart');
        }

        $this->cartService->addProduct($productId, $quantity);

        return $this->redirectToRoute('app_cart');
    }
    #[Route('/cart/remove', name: 'app_cart_remove')]
    public function remove(Request $request): Response
    {
        $productId = $request->query->get('productId');

        if (!$productId) {
            return $this->redirectToRoute('app_cart');
        }

        $this->cartService->removeProduct($productId);

        return $this->redirectToRoute('app_cart');
    }
}
