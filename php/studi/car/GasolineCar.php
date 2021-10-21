<?php



class GasolineCar extends Car
{
    public float $co2Emission;
    private const ECO_MALUS = 50;

    public function __construct(float $co2Emission, string $brand, float $price)
    {
        parent::__construct($brand, $price);
        $this->co2Emission = $co2Emission;
    }

    public function getCharacteristics(): array
    {
        $characteristics = parent::getCharacteristics();
        $characteristics['co2Emission'] = $this->co2Emission;

        return $characteristics;
    }

    public function getFinalPrice(): float
    {
        return $this->price + self::ECO_MALUS;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
}
