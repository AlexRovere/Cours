<?php

use App\Entity\User;
use App\Entity\Order;
use App\Entity\Product;
use App\Services\StripeService;
use Doctrine\ORM\EntityManagerInterface;

class ProductManager
{
    /**
     * @var EntityManagerInterface
     */

    protected $em;

    /**
     * @var StripeService
     */

    protected $stripeService;

    /** 
     * @param EntityMAnagerInterface $entityManager
     * @param StripeService $stripeService
     */

    public function __construct(
        EntityManagerInterface $entityManager,
        StripeService $stripeService
    ) {
        $this->em = $entityManager;
        $this->stripeService = $stripeService;
    }

    public function getProducts()
    {
        return $this->em->getRepository(Product::class)->findAll();
    }

    public function intentSecret(Product $product)
    {
        $intent = $this->stripeService->paymentIntent($product);

        return $intent['client_secret'] ?? null;
    }

    public function stripe(array $stripeParameter, Product $product)
    {
        $ressource = null;
        $data = $this->stripeService->stripe($stripeParameter, $product);

        if ($data) {
            $ressource = [
                'stripeBrand' => $data['charges']['data'][0]['payment_method_details']['card']['brand'],
                'stripeLast4' => $data['charges']['data'][0]['payment_method_details']['card']['last4'],
                'stripeId' => $data['charges']['data'][0]['id'],
                'stripeStatus' => $data['charges']['data'][0]['status'],
                'stripeToken' => $data['client_secret']
            ];
        }

        return $ressource;
    }

    public function create_subscription(array $ressource, Product $product, User $user) // Création de la commande dans la BDD
    {
        $order = new Order();
        $order->addProductId($product);
        $order->setUserId($user);
        $order->setPrix($product->getPrix());
        $order->setBrandStripe($ressource['stripeBrand']);
        $order->setLast4Stripe($ressource['stripeLast4']);
        $order->setIdChargeStripe($ressource['stripeId']);
        $order->setStatusStripe($ressource['stripeStatus']);
        $order->setStripeToken($ressource['stripeToken']);
        $order->setUpdatedAt(new DateTime('now'));
        $order->setCreatedAt(new DateTime('now'));
        $this->em->persist($order);
        $this->em->flush();
    }
}
