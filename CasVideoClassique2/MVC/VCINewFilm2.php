<?php 

//CODE PHP EN COUCHE SCRIPT CONTROLLEUR PAGE ACCUEIL

//module presentation
require("DAO/video.dao.php");
require("metier/film.metier.php");
$user = 'root';
$password = '';

$film = new Film($_POST['ID_FILM'], $_POST['TITRE_FILM'],$_POST['CODE_TYPE_FILM'],$_POST['ID_REALIS'],$_POST['ANNEE_FILM'],$_POST['REF_IMAGE'],$_POST['RESUME'] );

VideoDAO::creationFilm($user, $password, $film);


header('Location: VCIAdmin.php?error=film ' . strtoupper(trim($film->getTitre())) . ' inséré avec succès' );



?>
    