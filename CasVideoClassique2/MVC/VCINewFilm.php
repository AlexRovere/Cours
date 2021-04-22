<?php 

//CODE PHP EN COUCHE SCRIPT CONTROLLEUR PAGE ACCUEIL

//module presentation
require("presentation/VCINewFilm.vue.php");
require("DAO/video.dao.php");
$user = 'root';
$password = '';
$resultType = [];
$resultStar = [];
$resultType = VideoDAO::ListeTypesFilms($user, $password);
$resultStar = VideoDAO::ListeStarFilms($user, $password);

//afficher page
afficheNewFilm($resultType, $resultStar);



?>
    