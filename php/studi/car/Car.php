<?php
require_once 'CharacteristicsDisplayable.php';
abstract class Car implements CharacteristicsDisplayable
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

    public function getCharacteristics(): array
    {
        return [
            'price' => $this->price,
            'brand' => $this->brand,
        ];
    }

    abstract function getFinalPrice(): float;
    abstract function getPrice(): float;

    public function displayPrice()
    {
        return self::class;
    }
}
