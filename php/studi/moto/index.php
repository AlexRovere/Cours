<?php

include('Moto.php');
include('Race.php');
include('Logger.php');

// $moto = new Moto();
// $moto->marque = 'Yamaha';
// $moto->couleur = 'Rouge';
// $moto->vitesse = 210;

$moto1 = new Moto('Yamaha', 'Rouge', 350);
$moto4 = new Moto('Honda', 'Violet', 300);


$race = new Race($moto1, $moto4);

$logger = new Logger();
$logger->log('test');
