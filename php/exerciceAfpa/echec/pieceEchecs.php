<?php 

abstract class PieceEchecs {
    
    private $_x;
    private $_y;
    private $_couleur;

    function __construct($x, $y, $couleur)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setCouleur($couleur);
    }

    public function getX() {return $this->_x;}
    public function getY() {return $this->_y;}
    public function getCouleur() {return $this->_couleur;}

    public function setX($x)
    {
        if ($x > 0 && $x < 9) {
            $this->_x = $x;
        }
    }

    public function setY($y)
    {
        if ($y > 0 && $y < 9) {
            $this->_y = $y;
        }
    }

    public function setCouleur($couleur)
    {
        if ($couleur = 1)
        {
            $this->_couleur = "blanc";
        }
        else if ($couleur = 2)
        {
            $this->_couleur = "noire";
        }
        else 
        {
            echo 'Veuillez choisir la valeure 1 ou 2';
        }
    }

    public function getCouleurCase() 
    {
        if (($this->_x + $this->_y) % 2 == 0) 
        {
            echo 'Le pion est sur une case noire';
        }
        else 
        {
            echo 'Le pion est sur un case blanche';
        }
    }

    public function getPosition()
    {
        return $position = [$this->_x, $this->_y];
    }

    public function estDansLechiquier($x, $y)
    {
        if($x > 0 && $x < 9 && $y > 0 && $y < 9) 
        {
            return true;
        }
    }

 


}


