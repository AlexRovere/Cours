<?php //************** code PHP procédural classique ************** 
      // saisie coordonnées adhérent pour réservation
	  // page appelée par VCIResa3.php


require("presentation/VCIResa4.vue.php");
require("DAO/Video.DAO.php");

$cejour = getdate(); 
$libcejour = $cejour['year'] . "-" . $cejour['mon'] . '-' . $cejour['mday'] ;
$dataResa["numadherent"] = $_GET["numadherent"];
$dataResa["nom"] = $_GET["nom"];
$dataResa["codfil"] = $_GET["codfil"];
$dataResa["libfil"] = $_GET["libfil"];
$dataResa["libcejour"] = $libcejour;

// pour se connecter а la BDD
$user="root";
$password="";

if(VideoDAO::ExisteAdherent($user, $password, $dataResa)) {

	if(VideoDAO::ExisteResaPourCeClient($user, $password, $dataResa)) {
		AfficheErreurResa($dataResa);
	}
	else {
		VideoDAO::InsertResa($user, $password, $dataResa);
		AfficheOKResa($dataResa);
	}
	
}
else {
	AfficheErreurAdherentInconnu();
}


?>
