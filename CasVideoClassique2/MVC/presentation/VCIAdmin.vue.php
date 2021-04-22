<?php //************** code PHP procédural classique **************
      // page accueil administration site Video-club


require('VCIEntete.vue.php');
require('VCITitreAdmin.vue.php'); 
require('VCIMenuAdmin.vue.php');

function afficheAdmin() {

	if(isset($_GET["error"]))
	$erreur = $_GET["error"] ;
else
	$erreur ="";


afficheEnTete() ?>

</head>
<body class="admin">
<!-- 1° ligne de titre : VCITitreAdmin.php-->
<header>
<?php afficheTitreAdmin() ?>
</header>

<!-- 2° ligne : colonne menu : VCIMenuAdmin.htm -->
<nav>
<?php afficheMenuAdmin() ?>
</nav>	

<!-- contenu principal de la page -->
<main>	
<h1 >Administration du Vidéo-Club</h1>
<?php // label erreur éventuel (après création nouveau film)
if($erreur != "") echo "<div class='important centrer erreur' > ".  $erreur . '</div>';
?>
</main>
<!-- fin de contenu principal de la page -->

</body>
</html>


<?php } ?>
