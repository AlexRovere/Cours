<?php

namespace App\Controller;

use App\Entity\Product;
use App\Manager\ProductManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StripeController extends AbstractController
{
    /**
     * @Route("/stripe/{id}", name="stripe")
     */
    public function payment(Product $product, ProductManager $productManager): Response
    {
        return $this->render('stripe/index.html.twig', [
            'user' => $this->getUser(),
            'intentSecret' => $productManager->intentSecret($product),
            'product' => $product
        ]);
    }

    /**
     * @Route("/stripe/{id}/paiement/load", name="subscription_paiement")
     * @param Product $product
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse\Response
     * @throws \Exception
     */
    public function subscription(Product $product, Request $request, ProductManager $productManager): Response
    {
        $user = $this->getUser();

        if ($request->getMethod() === "POST") {
            $ressource = $productManager->stripe($_POST, $product);

            if ($ressource !== null) {
                $productManager->create_subscription($ressource, $product, $user);

                return $this->render('success.html.twig', [
                    'produit' => $product
                ]);
            }
        }
    }
}
