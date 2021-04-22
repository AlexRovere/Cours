<?php //************** code PHP procédural classique ************** 
      // page de liste des types de films pour réservation 
	  
require('presentation/VCIEntete.vue.php');
require('presentation/VCITitre.vue.php');
require('presentation/VCIMenu.vue.php');

function AfficheListeTypeFilms($data) {
    ?>

<?php afficheEnTete(); ?>

<script type="text/javascript">
// fonction de contrôle du type saisi
// fonction déclenchée par onChange sur liste Select
// et déclenchant le submit du formulaire
function vazy()
{
	if (!(document.getElementById("typef").value==""))
		{
			document.getElementById("f_type").submit()
		}
}
</script>
</head>
<body>
<!-- 1° ligne de titre -->
<header>
	<?php  afficheTitre(); ?>
</header>

<!-- colonne menu -->
<nav>
	<?php  afficheMenu(); ?>
</nav>

<!-- contenu principal de la page -->
<main>	
<h1 >
Sélectionnez le type de film que vous recherchez :
</h1>
<form  action="VCIResa2.php" id="f_type" method = "get">
	<table class="cent">
		<tr>
			<td class="centrer">
				<select  name="typef" id="typef" onchange="vazy()" >
				<!-- première option par défaut -->
					<option selected value="">&lt;Sélectionnez le type recherché&gt;</option>
					<?php  // liste des types issus du recordset 
					foreach($data as $row){
					 ?>
					<option value = "<?php  echo $row['CODE_TYPE_FILM'] ?>"><?php  echo $row['LIB_TYPE_FILM']?></option>
					<?php  
					}
					?>
				</select>
			</td>
		</tr>
	</table>
</form>
</main>
<!-- fin de contenu principal de la page -->

</body>
</html>	

<?php 
}
?>
