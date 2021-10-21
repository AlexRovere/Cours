<?php

class Car
{
    public string $brand;
    public float $price;

    public function __construct(string $brand, float $price)
    {
        $this->brand = $brand;
        $this->price = $price;
    }

    public function description()
    {
        return "C'est une " . $this->brand . ' au prix de ' . $this->price . " €uros";
    }

    public function displayCharacteristics(Car $car)
    {

        foreach ($car as $key => $value) {
            echo '<li>' . $key . ' : ' . $value . '</li>';
        }
    }
}
