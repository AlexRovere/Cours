<?php

function displayPrice(Car $car)
{
    echo "Le prix final de votre " . $car->brand . " est de " . $car->getFinalPrice() . " € (anciennement : " . $car->getPrice() . " €)";
}
