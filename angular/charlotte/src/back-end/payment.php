<?php

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

// require '../../vendor/autoload.php';
require 'vendor/autoload.php';
$ids = require('paypal.php');

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        $ids['id'],
        $ids['secret']
    )
);

$list = new ItemList();
$item = (new Item())
->setName('item 1')
->setPrice(10)
->setCurrency('EUR')
->setQuantity(1);
$list->addItem($item);

$details = (new Details())
->setSubtotal(10);

$amount = (new Amount())
->setTotal(10)
->setCurrency('EUR')
->setDetails($details);

$transaction = (new Transaction())
->setItemList($list)
->setDescription('Achat sur mon site')
->setAmount($amount)
->setCustom('demo-1');

$payment = new Payment();
$payment->setTransactions($transaction);
$payment->setIntent('sale');
$redirectUrls = (new RedirectUrls())
->setReturnUrl('https://pastore-sacha.fr/')
->setCancelUrl('http://localhost/projets/angular/charlotte/src/back-end/paypal.php');
$payment->setRedirectUrls($redirectUrls);
$payment->setPayer((new Payer())->setPaymentMethod('paypal'));

try {
    echo $payment->getApprovalLink();
} catch (PayPalConnectionException $e) {
    echo $e->getMessage();
}


$payment->create($apiContext);

var_dump($payment);


