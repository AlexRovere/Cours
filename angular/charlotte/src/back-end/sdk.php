<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require '../../vendor/autoload.php';
class PaymentService
{
    public $apiContext;
    function executePayment($paymentId, $payerId)
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

