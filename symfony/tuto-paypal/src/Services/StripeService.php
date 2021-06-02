<?php

namespace App\Services;

use App\Entity\Product;
use Stripe\PaymentIntent;

class StripeService
{
    private $privateKey;

    public function __construct()
    {
        if ($_ENV['APP_ENV'] === 'dev') {
            $this->privateKey = $_ENV['STRIPE_SECRET_KEY_TEST'];
        } else {
            //clé live
        }
    }

    public function paymentIntent(Product $product)
    {
        \Stripe\Stripe::setApiKey($this->privateKey);

        return \Stripe\PaymentIntent::create([
            'amount' => $product->getPrix() * 100,
            'currency' => 'EUR',
            'payment_method_types' => ['card']
        ]);
    }

    public function paiment($amount, $currency, $description, array $stripeParameter)
    {
        \Stripe\Stripe::setApiKey($this->privateKey);
        $payment_intent = null;

        if (isset($stripeParameter['stripeIntentId'])) {
            $payment_intent = \Stripe\PaymentIntent::retrieve($stripeParameter['stripeIntentId']);
        }

        if ($stripeParameter['stripeIntentId'] === 'succeeded') {
        } else {
            $payment_intent->cancel();
        }

        return $payment_intent;
    }

    public function stripe(array $stripeParameter, Product $product)
    {
        return $this->paiment(
            $product->getPrix(),
            'EUR',
            $product->getNom(),
            $stripeParameter
        );
    }
}
