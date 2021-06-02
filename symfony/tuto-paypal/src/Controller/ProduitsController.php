<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('produits/index.html.twig', [
            'produits' => $productRepository->findAll()
        ]);
    }
}
