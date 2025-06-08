<?php

namespace App\Controller;

use App\Service\DummyJsonApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index(): Response
    {
        $products = $this->dummyJsonApi->getProducts();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
