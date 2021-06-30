<?php

namespace App\Controller;

use Exception;
use Stripe\Stripe;
use App\Entity\Product;
use App\Manager\ProductManager;
use Stripe\BillingPortal\Session;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('default/success.html.twig', []);
    }


    /**
     * @Route("/error", name="error")
     */
    public function error(): Response
    {
        return $this->render('default/error.html.twig', []);
    }


    /**
     * @Route("/create-session", name="checkout")
     */
    public function checkout(ProductManager $productManager, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $id = $data['id'];
        \Stripe\Stripe::setApiKey('sk_test_51Ixpg5DmFmsRyV8Bf1PBIxvEY1OtPxy2iMIkYdiH2S3YvzgpTzsp5txj1dqYHE8vZTP3vs747xDYzdCqhBdRiAF200B7FMhQTH');
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);
        // try {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product->getNom(),
                    ],
                    'unit_amount' => $product->getPrix() * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost:4200/success/{CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://locahost:4200/cancel',
            // 'success_url' => $this->generateUrl('success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            // 'cancel_url' => $this->generateUrl('error', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);
        $productManager->createSession($session->id);
        // } catch (Exception $e) {
        //     return $e;
        // }

        return new JsonResponse(['id' => $session->id]);
    }

    /**
     * @Route("/webhook", name="webhook")
     */
    public function webhook(Request $request, ProductManager $productManager): JsonResponse
    {
        $endpoint_secret = 'whsec_JFrxF0XGcd1tmW5ZfUdqxoZcydLYf664';
        // ('STRIPE_WEBHOOK');

        $payload = $request->getContent();
        $sig_header = $request->headers->get('stripe-signature');
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return new JsonResponse(['message' => 'invalid payload !'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid Signature
            return new JsonResponse(['message' => 'invalid signature !'], 400);
        }
        // Handle the checkout.session.completed event 
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $productManager->handle_checkout_session($session);
            http_response_code(200);
        }

        return new JsonResponse(['message' => 'success !'], 200);
    }

    /**
     * @Route("/session-status", name="session-status")
     */
    public function sessionStatus(ProductManager $productManager, Request $request): JsonResponse
    {
        $statut = $productManager->getSessionStatus($request->query->get('session_id'));
        return new JsonResponse(['statut' => $statut]);
    }


    /**
     * @Route("/test", name="test")
     */
    public function test(ProductManager $productManager): JsonResponse
    {
        $productManager->markSessionPaid('cs_test_a1fpyb6iHp7IZuapwRRqxdwbnuF73aKmoO3G3O87wKQRg4lsBM9Li05t2u');
        $statut = $productManager->getSessionStatus('cs_test_a1fpyb6iHp7IZuapwRRqxdwbnuF73aKmoO3G3O87wKQRg4lsBM9Li05t2u');
        return new JsonResponse(['return' => $statut]);
    }
}
