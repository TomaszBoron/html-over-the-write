<?php

namespace App\Controller;

use App\Service\DummyJsonApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ProductController extends AbstractController
{
    private DummyJsonApiService $dummyJsonApi;

    public function __construct(DummyJsonApiService $dummyJsonApi)
    {
        $this->dummyJsonApi = $dummyJsonApi;
    }

    #[Route('/products', name: 'app_product')]
    public function index(Request $request): Response
    {
        $category = $request->query->get('category');

        if ($category) {
            $products = $this->dummyJsonApi->getProductsByCategory($category);
        } else {
            $products = $this->dummyJsonApi->getProducts();
        }

        $categories = $this->dummyJsonApi->getProductsCategory();

        return $this->render('products/index.html.twig', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_detail')]
    public function detail(Request $request, string $id): Response
    {
        $product = $this->dummyJsonApi->getProductById($id);

        if (!$product) {
            throw $this->createNotFoundException('Produkt nie znaleziony');
        }

        // Check if the request is for a Turbo Stream response
        if (str_contains($request->headers->get('Accept'), 'text/vnd.turbo-stream.html')) {
            return $this->render(
                '/product-details/stream.html.twig', [
                    'product' => $product
                ],
                new Response('', 200, ['Content-Type' => 'text/vnd.turbo-stream.html'])
            );
        }

        return $this->render('product-details/index.html.twig', [
            'product' => $product,
        ]);
    }
}
