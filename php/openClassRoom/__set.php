<?php
class MaClasse
{
  private $unAttributPrive;
  private $_attributs = [];
  
  public function __set($nom, $valeur)
  {
    $this->_attributs[$nom] = $valeur; 
  }
  public function afficherAttributs() 
  {
      echo print_r($this->_attributs, true);
  }
}

$obj = new MaClasse;

$obj->attribut = 'Simple test';
$obj->unAttributPrive = 'Autre simple test';
$obj->afficherAttributs();
