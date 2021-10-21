<?php

class GasolineCar extends Car
{
    public float $co2Emission;

    public function __construct(float $co2Emission, string $brand, float $price)
    {
        parent::__construct($brand, $price);
        $this->co2Emission = $co2Emission;
    }

    public function description()
    {
        return parent::description() . " et d'une emission de " . $this->co2Emission;
    }
}
