<?php

namespace App\Services;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

class PaymentService
{
    public $apiContext;

    public function __construct(ContainerBagInterface $params)
    {
        $this->params = $params;
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $params->get('paypal.id'),
                $params->get('paypal.secret')
            )
        );
    }

    public function definePayment($ticketPrice)
    {
        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        
        $redirectUrls->setReturnUrl('https://loto.dreamevo.fr/process')
            ->setCancelUrl('https://loto.dreamevo.fr/cancel');

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("EUR")
            ->setTotal($ticketPrice);

        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription("Achat d'un ticket pour la loterie DreamEvo");

        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->apiContext);

            return $payment;
        } catch (\Exception $ex) {
            return null;
        }
    }

    public function executePayment($paymentId, $payerId)
    {
        $payment = Payment::get($paymentId, $this->apiContext);
        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute payment
            $result = $payment->execute($execution, $this->apiContext);
            return $result;
        } catch (\Exception $ex) {
            return null;
        }
    }
}
