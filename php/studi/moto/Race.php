<?php

class Race
{
    public Moto $moto1;
    public Moto $moto2;

    public function __construct(Moto $moto1, Moto $moto2)
    {
        $this->moto1 = $moto1;
        $this->moto2 = $moto2;
    }

    public function startRace()
    {
        if ($this->moto1->vitesse > $this->moto2->vitesse) {
            echo $this->moto1->getDescription() . " a gagné !";
        } else {
            echo $this->moto2->getDescription() . " a gagné !";
        }
    }
}
