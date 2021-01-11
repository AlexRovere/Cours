<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles2.css">
	<link rel="shortcut icon" href="images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="javascript.js"></script>
	<title>L’Ïncantore cosméceutiques, l'alliance du cosmétique et de la nature</title>
	
</head>

<body>

	<?php

		include ("header.php") ;

	?>

	<div id="bordure">	

		<section>

	<?php
		
			
		
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{

					        die('Erreur : '.$e->getMessage());
					}

					$reponse = $bdd->query('SELECT * FROM produits where produit_id='.$_GET['id']);
					while ($donnees = $reponse->fetch())
					{
						
					?> 
					
						<div id="fiche_produit">

							<div>

								<h1><?php echo $donnees['nom']; ?></h1>
								<img src="docs/photos/<?php echo $donnees['photo']; ?>" alt="photo <?php echo $donnees['nom']; ?>" title="photo <?php echo $donnees['nom']; ?>" class="photo_source">

								<form action="" method="get">

									<p>Prix :<?php echo $donnees['prix']; ?> €</p>
			  						<label for="quantity">Quantité:</label>
			  						<input type="number" id="quantity" name="quantity" placeholder = "0" required><br><br>	
									<button type="submit" class="panier" >Ajouter au panier</button>

								</form>

							</div>	

							<ul id="fiche_source_ul">
								
								<a href="#indication"><li>Indications</li></a>
								<a href="#formulation"><li>Formulations</li></a>
								<a href="#propriete"><li>Propriétés</li></a>	
								<a href="#mode"><li>Mode d'emploi</li></a>
								<a href="#avis"><li>Avis</li></a>

							</ul>


						</div>

		</section>
		
		<section class="div_marge">			


					<h2 id="indication">Indications</h2>	

					<p class="p_center"><?php echo $donnees['indication']; ?></p>

					<h2 id="formulation">Formulations</h2>

					<p class="p_center"><?php echo $donnees['formulation']; ?></p>

					<h2 id="propriete">Propriétés</h2>

					<p class="p_center"><?php echo $donnees['propriete']; ?></p>

					<h2 id="mode">Mode d'emploi</h2>

					<p class="p_center"><?php echo $donnees['mode']; ?></p>	

					<h2 id="avis">Avis</h2>	

					<?php }
					$reponse = $bdd->query('SELECT avis.*, produits.nom as produit FROM avis INNER JOIN produits on avis.produit_id=produits.produit_id where avis.produit_id='.$_GET['id']);
					while ($donnees = $reponse->fetch())
					{ ?> 

					<div>
					Nom : <?php echo $donnees ['nom'];?>
					</div>
					<div>
					Produit : <?php echo $donnees ['produit'];?>
					</div>
					<div>
					Note : <?php echo $donnees ['note'];?>/5
					</div>
					<div>
					Date : <?php echo $donnees ['date'];?>
					</div>
					<div>
					Ville : <?php echo $donnees ['ville'];?>
					</div>

					<p class="p_center"><?php echo $donnees['message']; ?></p>
					<?php } ?> 

		</section>			

	</div>

	<?php
		
		include ("footer.php");

	?> 

</body>
</html>