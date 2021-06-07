<?php 

// script controleur page 1 réservation (liste des films)

require("presentation/VCIResa.vue.php");
require("DAO/Video.DAO.php");

//Connexion BDD
$user = "root";
$password = "";

//Charger la liste des types de films dans un array
$data = [];
$data = VideoDAO::ListeTypesFilms($user, $password);

//presentation
AfficheListeTypeFilms($data);

?>
