<?php

require('pieceEchecs.php');

class Cavalier extends PieceEchecs 
{

    private $moveX = 1;
    private $moveY = 2;

    public function __construct($x, $y, $couleur)
    {
        parent::__construct($x, $y, $couleur);
    }

    public function moveX() {return $this->_moveX;}
    public function moveY() {return $this->_moveY;}

    public function peutAllerA($x, $y) :bool
    {
        if ($this->estDansLechiquier($this->$x, $this->$y))   // SI le pion est dans l'échiquier
        {
            if ($this->getX() ) 
        }
       
        // SI le pion ne sort pas du jeux
        // SI aucun pion ne se trouve à l'emplacement de son arrivé
        // oui
        // SINON hors du jeux OU un pion bloque l'accès 
    }
}

$cavalier = new Cavalier(1,1,1);
var_dump($cavalier);
$cavalier->getCouleurCase();

?>
