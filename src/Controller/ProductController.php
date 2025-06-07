<?php

namespace App\Controller;

use App\Service\StrapiApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ProductController extends AbstractController
{
    private StrapiApiService $strapiApi;

    public function __construct(StrapiApiService $strapiApi)
    {
        $this->strapiApi = $strapiApi;
    }

    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        $products = $this->strapiApi->getProducts();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
