<?php

include('Car.php');
include('Tire.php');
include('ElectricCar.php');
include('GasolineCar.php');
include('displayCharacteristics.php');
include('displayPrice.php');



$mazda = new ElectricCar(500, 'mazda', 25000);
$peugeot = new GasolineCar(500, 'peugeot', 25000);
$pneu = new Tire(12, 45, 623);


displayPrice($peugeot);
