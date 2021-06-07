<?php

class Film {


    private $_id;
    private $_titre;
    private $_type;
    private $_real;
    private $_annee;
    private $_ref;
    private $_resume;

    public function getId() {return $this->_id;}
    public function getTitre() {return $this->_titre;}
    public function getType() {return $this->_type;}
    public function getReal() {return $this->_real;}
    public function getAnnee() {return $this->_annee;}
    public function getRef() {return $this->_ref;}
    public function getResume() {return $this->_resume;}

    public function __construct($id, $titre, $type, $real, $annee, $ref, $resume)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setType($type);
        $this->setReal($real);
        $this->setAnnee($annee);
        $this->setRef($ref);
        $this->setResume($resume);

    }

    public function setId($id)
    {
        $this->_id = $id;
    }
    public function setTitre($titre) 
    {
        $this->_titre = $titre;
    }
    public function setType($type)
    {
         $this->_type = $type;
    }
    public function setReal($real) 
    {
        $this->_real = $real;
    }
    public function setAnnee($annee)
    { 
         $this->_annee = $annee;
    }
    public function setRef($ref)
    {
         $this->_ref = $ref;
    }
    public function setResume($resume)
    {
        $this->_resume = $resume;
    }

    public function __toString()
    {
        return "Film : ".$this->_id." -".$this->_titre." (".$this->_annee.")";
    }

}
