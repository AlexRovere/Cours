<?php //************** code PHP procédural classique ************** 
      // enregistrement effectif de la réservation 
      // page appelé par VCIResa3.php
      // insertion de la commande en table, affichage d'un accusé réception
      // et retour à page VCIResa.php	



	require('presentation/VCIEntete.vue.php');
	require('presentation/VCITitre.vue.php');
	require('presentation/VCIMenu.vue.php');
      

function AfficheDebutPage() {

$cejour = getdate(); 
$libcejour = $cejour['year'] . "-" . $cejour['mon'] . '-' . $cejour['mday'] ;

          ?>

<?php afficheEnTete() ?>

</head>
<body >
<!-- 1° ligne de titre -->
<header>
	<?php  afficheTitre() ; ?>
</header>

<!-- 2° ligne : colonne menu et colonne contenu principal -->
<nav>
	<?php  afficheMenu(); ?>
</nav>

<!-- contenu principal de la page -->
<main>	
<h1 >Réservation de film</h1>
<?php  // le client demandé n'est pas trouvé
}

function AfficheErreurAdherentInconnu() {
?>


<div class="centrer erreur">
	Attention : les coordonnées client saisies sont erronnées !
	<form>
		<input type="button" value="Retour" onClick="javascript:history.go(-1)">
	</form>
</div>
<?php  
AfficheFinPage();

}
?>

<?php function 
AfficheErreurResa($dataResa) {
?>

<div class="centrer erreur">Attention : il y a déjà une réservation du film "<span class ="important"><?php  echo $_GET["libfil"]; ?></span>" pour l'adhérent <span class ="important"><?php  echo  $_GET["nom"]?></span>
	<form>
		<input type="button" value="Retour" onClick="javascript:history.go(-1)">
	</form>
</div>

<?php 

AfficheFinPage();
 }
 ?>

 <?php function AfficheOKResa($dataResa) {
	 ?>

<div class="centrer">
	<h2>Merci <span class ="important"><?php  echo $_GET["nom"]; ?></span>  pour votre réservation.</h2>
	<p >
	Il ne vous reste plus qu'à passer en boutique pour retirer votre exemplaire du film<span class ="important">
	<?php  echo $_GET["libfil"]; ?></span>
	</p>
	<form>
		<input type="button" value="Retour au menu" onClick="javascript:window.location.href='VCIAccueil.php';">
	</form>
</div>
<?php 
AfficheFinPage();
}
?>

<?php function AfficheFinPage(){
	?>
</main>

</body>
</html>

<?php 	//facultatif, pour faire propre	 
}
?>
