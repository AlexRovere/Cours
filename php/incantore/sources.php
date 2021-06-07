<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css"  href="styles2.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="javascript.js"></script>
	<title>L’Ïncantore cosméceutiques, l'alliance du cosmétique et de la nature</title>
	
	
</head>

<body>

	<div id="bloc_page">

		<?php
		include ("header.php");
		?>

	

	<div id="bordure">		
		
		<h1>Les sources végétales</h1>

			<section id="liste_source">
				<?php
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{

					        die('Erreur : '.$e->getMessage());
					}

					$reponse = $bdd->query('SELECT * FROM sources ');

					while ($donnees = $reponse->fetch())
					{
						
					?>

						<div id="sources_marge">

							<a href="fiche_source.php?id=<?php echo $donnees['source_id']; ?>" target="_blank"><h2><?php echo $donnees['nom']; ?></h2></a>

							<a href="fiche_source.php?id=<?php echo $donnees['source_id']; ?>" target="_blank"><img src="docs/photos/<?php echo $donnees['photo_min']; ?>" alt="photo <?php echo $donnees['nom']; ?>" title="photo <?php echo $donnees['nom']; ?>" class="photo_source"></a>

						</div>
					<?php
					}
					?>
<!--
				<div style="width:50%">

					<h4 id="aloe vera">Aloe vera, un cactus utile et protecteur</h4>
					<img src="docs/photos/aloe_vera.jpg" alt="photo d'aloe vera" class="photo_source">	
				</div>
				<div style="width:50%">
					<h4 id="curcuma">Curcuma, le secret de beauté des Indes</h4>	
					<img src="docs/photos/curcuma-source_1.jpg" alt="photo de curcuma" class="photo_source">
				</div>
			
				<div style="width:50%">
					<h4 id="emblica officinalis">Emblica Officinalis, : un régénérant végétal puissant </h4>
					<img src="docs/photos/emblica.png" alt="photo d'emblica" class="photo_source">
				</div>
				<div style="width:50%">
					<h4 id="grenade">Grenade, un secret de beauté ancestral</h4>	
					<img src="docs/photos/grenade.jpg" alt="photo de grenade" class="photo_source">
				</div>
				
				<div style="width:50%">
					<h4 id="huile d'argan">Huile d'argan, un élixir aux vertus précieuses</h4>
					<img src="docs/photos/argan-source.jpg" alt="photo d'argan" class="photo_source">

				</div>

				<div style="width:50%">

					<h4 id="huile d'olive">Huile d'olive, un trésor millénaire pour notre peau et notre santé </h4>
					<img src="docs/photos/olivo sito-source.jpg" alt="photo d'olive" class="photo_source">	
				</div>
				
				<div style="width:50%">

					<h4 id="pongamia">Pongamia, un  filtre solaire ni chimique ni minéral</h4>
					<img src="docs/photos/pongamia.jpg" alt="photo de pongamia" class="photo_source">
				</div>
				<div style="width:50%">
					<h4 id="resveratrol">Résvératrol, un allié végétal aux pouvoirs anti-âge étonnants</h4>
					<img src="docs/photos/resveratrol.jpg" alt="photo de resveratrol" class="photo_source">	
				</div>
				
				<div style="width:50%">
					<h4 id="sang du dragon">Sang du dragon, un trésor régénérant de la Nature Amazonienne </h4>
					<img src="docs/photos/sangue di drago.jpg" alt="photo de sang de dragon" class="photo_source">	
				</div>
				<div style="width:50%">
					<h4 id="the vert">Thé vert, rituel cosmétique pour maintenir un teint éclatant et zen à tout âge</h4>
					<img src="docs/photos/the vert-source.jpg" alt="photo de thé vert" class="photo_source">	


				</div>

-->


		</section>

			


		

	</div>		

	<?php
		include ("footer.php");
		?>

	</div>

</body>

</html>