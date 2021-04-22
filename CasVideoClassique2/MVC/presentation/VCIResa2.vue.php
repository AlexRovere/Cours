<?php //************** code PHP procédural classique ************** 
      // liste des films du type voulu
      // page appelée par VCIResa.php
	  
      // recherche des films du type demandé en vciresa.php
      // et affichage en tableau avec liens a href personnalisés vers VCIResa3.php

      require('presentation/VCIEntete.vue.php');
      require('presentation/VCITitre.vue.php');
      require('presentation/VCIMenu.vue.php');
      
      function AfficheListeFilms($rowTypeFilm, $dataFilms) {
          ?>

<?php afficheEnTete() ?>

</head>
<body>
<!-- 1° ligne de titre -->
<header>
	<?php  afficheTitre() ; ?>
</header>

<!-- colonne menu -->
<nav>
	<?php  afficheMenu(); ?>
</nav>

<!-- contenu principal de la page -->
<main>	
<h1 >
Liste des films du type <?php  echo $rowTypeFilm['LIB_TYPE_FILM'] ;?></h1>
<?php  // si aucun film pour le type demandé : pas de tableau
if (count($dataFilms) ==0){
?>
<div class="centrer">
<span class="erreur">Désolé, aucun film disponible pour le type <?php  echo $rowTypeFilm['LIB_TYPE_FILM'] ;?></span>
</p>

<?php  //il y a des films pour le type demandé
} else {
?>
<h2>Sélectionnez le film que vous désirez réserver :</h2>
<div class="centrer cent">
<table class="listefilms">
    <tr>
      <th >Titre du film</th>
      <th >Son année</th>
      <th  colspan="2">Réalisateur</th>
	  <th >Affiche</th>
    </tr>
    
  <?php  // alimentation de lignes du tableau HTML pour chaque enregistrement du RS2
     foreach($dataFilms as $rowFilm) {
  ?>
	<tr>
	  <td> <a href="VCIResa3.php?filmchoisi=<?php echo $rowFilm['ID_FILM'] ;?>&libfilmchoisi=<?php  echo urlencode($rowFilm['TITRE_FILM']) ;?>&anfilmchoisi=<?php  echo $rowFilm['ANNEE_FILM'] ; ?>&reafilmchoisi=<?php  echo urlencode($rowFilm['PRENOM_STAR'] . ' ' . $rowFilm['NOM_STAR']) ;?>&affiche=<?php  echo urlencode($rowFilm['REF_IMAGE']) ; ?>"> 
	  <?php  echo $rowFilm['TITRE_FILM'] ; ?> </a></td>
      <td> <?php  echo $rowFilm['ANNEE_FILM'] ; ?></td>
	  <td> <?php  echo $rowFilm['NOM_STAR'] ; ?></td>
	  <td> <?php  echo $rowFilm['PRENOM_STAR'] ; ?></td>
	  <td><a href="VCIResa3.php?filmchoisi=<?php echo $rowFilm['ID_FILM'] ;?>&libfilmchoisi=<?php  echo urlencode($rowFilm['TITRE_FILM']) ;?>&anfilmchoisi=<?php  echo $rowFilm['ANNEE_FILM'] ; ?>&reafilmchoisi=<?php  echo urlencode($rowFilm['PRENOM_STAR'] . ' ' . $rowFilm['NOM_STAR']) ;?>&affiche=<?php  echo urlencode($rowFilm['REF_IMAGE']) ; ?>"> 
	  <img border="0" src="presentation/images/affiches/<?php  echo $rowFilm['REF_IMAGE'] ;?>" title="<?php  echo $rowFilm['RESUME']; ?>"></a></td>
	</tr> 
  <?php  
  	}  // fin du while
  ?>
    
</table>
</div>
<?php 
} // fin du if
?>
<div class="centrer cent">
<table  border="0" width="80%">
	<tr>
		<td width="50%" align="right">
			<form action="VCIResa.php">
				<input type="submit" value="Autre type de film">
			</form>
		</td>
		<td width="50%" align="left">
			<form action="VCIAccueil.php">
				<input type="submit" value="Retour accueil">
			</form>
		</td>
	</tr>
</table>
</div>
</main>

</body>
</html>

<?php } ?>
