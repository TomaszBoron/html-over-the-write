<?php

namespace App\Controller;

use App\Service\StrapiApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    private StrapiApiService $strapiApiService;

    public function __construct(StrapiApiService $strapiApiService)
    {
        $this->strapiApiService = $strapiApiService;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $products = $this->strapiApiService->getProducts();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products,
        ]);
    }
}
