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

    #[Route('/product', name: 'app_product')]
    public function index(Request $request): Response
    {
        $category = $request->query->get('category');

        if ($category) {
            $products = $this->dummyJsonApi->getProductsByCategory($category);
        } else {
            $products = $this->dummyJsonApi->getProducts();
        }

        $categories = $this->dummyJsonApi->getProductsCategory();

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
