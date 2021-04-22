<?php //************** code PHP procédural classique **************
      // page saisie d'un nouveau film 
	  

require('VCIEntete.vue.php');
require('VCITitreAdmin.vue.php'); 
require('VCIMenuAdmin.vue.php');

function afficheNewFilm($resultType, $resultStar) {

afficheEnTete() ?>
</head>
<body class="admin">
<!-- 1° ligne de titre :VCITitreAdmin.php -->
	<header>
<?php afficheTitreAdmin()  ?>
</header>

<!-- colonne menu VCIMenuAdmin.htm -->
<nav>
	<?php afficheMenuAdmin() ?>
</nav>
			
<!-- contenu principal de la page -->	
<h1 >Saisie d'un nouveau film</h1>

<form name="frmNewFilm" action="VCINewFilm2.php" method="post">
<table>
	<tr>
		<td>Identifiant :</td><td><input type = "text" name="ID_FILM" /></td>
	</tr> 
	<tr>
		<td>Titre :</td><td><input type = "text" name="TITRE_FILM" /></td>
	</tr> 
	<tr>
		<td>Type de film :</td>
		<td>
			<select name="CODE_TYPE_FILM">
				<?php
				foreach($resultType as $row) {
				 ?>
				<option value = "<?php  echo $row['CODE_TYPE_FILM'] ?>"><?php  echo $row['LIB_TYPE_FILM']?></option>
				<?php  
				}
				?>
			</select>
		</td>
	</tr> 
	<tr>
		<td>Réalisateur :</td>
		<td>
			<select name="ID_REALIS" />
				<?php
				foreach($resultStar as $row){
				?>
				<option value = "<?php  echo $row['ID_STAR'] ?>"><?php  echo trim($row['NOM_STAR']) . " " . trim($row['PRENOM_STAR']);?></option>
				<?php  
				}
				?>
			</select>
		</td>
	</tr> 
	<tr>
		<td>Année de sortie :</td><td><input type = "text" name="ANNEE_FILM" /></td>
	</tr> 
	<tr>
		<td>Affiche :</td><td><input type = "text" name="REF_IMAGE" /></td>
	</tr> 
	<tr>
		<td>Résumé :</td><td><textarea name="RESUME"></textarea></td>
	</tr> 
	<tr>
		<td><input type="submit" value="Créer" /></td><td><input type="reset" value="Recommencer"/ ></td>
	</tr>
</table>
</form>
<!-- fin de contenu principal de la page -->
		
</body>
</html>

<?php 	//facultatif, pour faire propre…	 
}
?>
