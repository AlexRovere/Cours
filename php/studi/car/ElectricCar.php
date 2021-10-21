<?php

class ElectricCar extends Car
{
    public float $batteryAutonmy;
    private const CONVERSION_BONUS = 2500;

    public function __construct(float $batteryAutonomy, string $brand, float $price)
    {
        parent::__construct($brand, $price);
        $this->batteryAutonomy = $batteryAutonomy;
    }

    public function getCharacteristics(): array
    {
        $characteristics = parent::getCharacteristics();
        $characteristics['batteryAutonmy'] = $this->batteryAutonmy;

        return $characteristics;
    }

    public function getFinalPrice(): float
    {
        return $this->price - self::CONVERSION_BONUS;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
