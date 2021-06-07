<?php //************** code PHP procédural classique ************** 


// script controleur page 2 réservation (liste des films)

require("presentation/VCIResa2.vue.php");
require("DAO/Video.DAO.php");

//Connexion BDD
$user = "root";
$password = "";

if (isset($_GET['typef'])) {
	$rowTypeFilm = VideoDAO::retourneTypeFilm($user, $password, $_GET['typef']);
	$dataFilms = [];
	$dataFilms = VideoDAO::listeFilmsParType($user, $password, $_GET['typef']);
	AfficheListeFilms($rowTypeFilm, $dataFilms);
}


?>
