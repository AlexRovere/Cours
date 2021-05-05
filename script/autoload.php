<?php

class DbDriver {
    protected $db;
    
    protected function __construct($dsn, $user, $pass) {
        $this->db = new PDO($dsn, $user, $pass);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected static $_inst;

    public static function Init($dsn, $user, $pass) {
        self::$_inst = new DbDriver($dsn, $user, $pass);
        return self::$_inst;
    }

    public static function Get() {
        if(empty(self::$_inst)) {
            throw "Error(please configure DB)";
        }
        return self::$_inst;
    }
}

// DbDriver::Init($locahost, $admn, $mdp); //Creation de l'occurence

// $bdd = DbDriver::Get(); // assigne la bdd 
