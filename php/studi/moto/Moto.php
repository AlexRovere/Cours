<?php

class Moto
{
    public string $marque;
    public string $couleur;
    public int $vitesse;

    public function __construct($marque, $couleur, $vitesse)
    {
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->vitesse = $vitesse;
    }

    public function __destruct()
    {
        echo $this->marque . ' est rentré au garage';
    }

    public function getDescription()
    {
        return $this->marque . ' ' . $this->couleur . ' ayant une vitesse maximal de ' . $this->vitesse . ' km/h';
    }
}
