<?php

class Personnage {
    private $_force = 20;
    private $_localisation;
    private $_experience = 50;
    private $_vie = 30;

    
  public function __construct($force, $degats) // Constructeur demandant 2 paramètres
  {
    echo 'Voici le constructeur !'; // Message s'affichant une fois que tout objet est créé.
    $this->setForce($force); // Initialisation de la force.
    $this->setVie($degats); // Initialisation des dégâts.
    $this->_experience = 1; // Initialisation de l'expérience à 1.
  }

    public function parler()
    {
        echo 'Je suis un personnage ! ';
    }
    
    public function gainExperience($montant)
    {
        $this->_experience += $montant;
    }

    public function frapper(Personnage $target) {
        $target->_vie -= $this->_force;
    }
 
  // Mutateur chargé de modifier l'attribut $_force.
  public function setForce($force)
  {
    if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_force = $force;
  }

    // Mutateur chargé de modifier l'attribut $_vie.
    public function setVie($vie)
    {
      if (!is_int($vie)) // S'il ne s'agit pas d'un nombre entier.
      {
        trigger_error('La vie d\'un personnage doit être un nombre entier', E_USER_WARNING);
        return;
      }
      
      if ($vie > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
      {
        trigger_error('La vie d\'un personnage ne peut dépasser 100', E_USER_WARNING);
        return;
      }
      
      $this->_vie = $vie;
    }
  
  // Mutateur chargé de modifier l'attribut $_experience.
  public function setExperience($experience)
  {
    if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_experience = $experience;
  }
  
  // Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
  public function getVie()
  {
    return $this->_degats;
  }
  
  // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
  public function getForce()
  {
    return $this->_force;
  }
  
  // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
  public function getExperience()
  {
    return $this->_experience;
  }

  public function getAll()
  {
      echo  "PDV : " . $this->_vie . "\nFORCE : " . $this->_force . "\nXP : " . $this->_experience;
  }
  
}


$siegfried = new Personnage(10, 20);
$nightmare = new Personnage(15, 50);
$siegfried->setForce(100);
$siegfried->frapper($nightmare);
$nightmare->frapper($siegfried);
$nightmare->getAll();
$siegfried->getAll();

