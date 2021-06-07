<?php //************** code PHP procédural classique ************** 

require('VCIEntete.vue.php');
require('VCITitre.vue.php'); 
require('VCIMenu.vue.php');

function AfficheEcranAccueil() { ?>

<?php afficheEnTete(); ?>
</head>
<body>

<!-- 1° ligne de titre -->
<header>
	<?php  afficheTitre(); ?>
</header>

<!--colonne menu : VCIMenu.htm -->
<nav>
	<?php  afficheMenu(); ?>
</nav>
		
<!-- contenu principal de la page -->
<main>	
<h1>
Bienvenue sur le site du Vidéo Club !
</h1>
</main>
<!-- fin de contenu principal de la page -->

</body>
</html>
<?php } ?>
