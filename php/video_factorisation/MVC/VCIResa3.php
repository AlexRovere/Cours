<?php //************** code PHP procédural classique ************** 
      // saisie coordonnées adhérent pour réservation
	  // page appelée par VCIResa2.php


require("presentation/VCIResa3.vue.php");
require("DAO/Video.DAO.php");

$dataResa["filmchoisi"] = htmlspecialchars($_GET["filmchoisi"]);
$dataResa["libfilmchoisi"] = htmlspecialchars($_GET["libfilmchoisi"]);
$dataResa["anfilmchoisi"] = htmlspecialchars($_GET["anfilmchoisi"]);
$dataResa["reafilmchoisi"] = htmlspecialchars($_GET["reafilmchoisi"]);
$dataResa["affiche"] = htmlspecialchars($_GET["affiche"]);





AfficheDetailFilm($dataResa);

?>
