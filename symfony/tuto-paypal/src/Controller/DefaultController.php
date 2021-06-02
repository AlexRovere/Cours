<?php

namespace App\Controller;

use Stripe\Stripe;
use Stripe\BillingPortal\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/success", name="success")
     */
    public function success(): Response
    {
        return $this->render('default/index.html.twig', []);
    }


    /**
     * @Route("/error", name="error")
     */
    public function error(): Response
    {
        return $this->render('default/index.html.twig', []);
    }


    /**
     * @Route("/create-checkout-session", name="checkout")
     */
    public function checkout()
    {
        \Stripe\Stripe::setApiKey('sk_test_51Ixpg5DmFmsRyV8Bf1PBIxvEY1OtPxy2iMIkYdiH2S3YvzgpTzsp5txj1dqYHE8vZTP3vs747xDYzdCqhBdRiAF200B7FMhQTH');

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'T-shirt',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('error', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return new JsonResponse(['id' => $session->id]);
    }
}
