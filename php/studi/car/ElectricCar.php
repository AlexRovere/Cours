<?php

class ElectricCar extends Car
{
    public float $batteryAutonmy;

    public function __construct(float $batteryAutonomy, string $brand, float $price)
    {
        parent::__construct($brand, $price);
        $this->batteryAutonomy = $batteryAutonomy;
    }

    public function description()
    {
        $description = parent::description();
        $description['batteryAutonmy'] = $this->batteryAutonmy;
        // return parent::description() . " et d'une autonomie de " . $this->batteryAutonomy;
    }
}
