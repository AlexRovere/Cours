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

			<h1>Nos produits</h1>

				<div id="produits">

			
						<?php
							try
							{
								$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
							}
							catch(Exception $e)
							{

							        die('Erreur : '.$e->getMessage());
							}

							$reponse = $bdd->query('SELECT * FROM produits ');

							while ($donnees = $reponse->fetch())
							{
								
							?>

								<div>

									<a href="fiche_produit.php?id=<?php echo $donnees['produit_id']; ?>" target="_blank"><h2><?php echo $donnees['nom']; ?></h2></a>


									<a href="fiche_produit.php?id=<?php echo $donnees['produit_id']; ?>" target="_blank"><img src="docs/photos/<?php echo $donnees['photo']; ?>" alt="photo <?php echo $donnees['nom']; ?>" title="photo <?php echo $donnees['nom']; ?>" class="photo_produit"></a>

								<form action="" method="get">

									<p>Prix :<?php echo $donnees['prix']; ?> €</p>
			  						<label for="quantity">Quantité:</label>
			  						<input type="number" id="quantity" name="quantity" placeholder = "0" required><br><br>	
									<button type="submit" id="button" class="panier" >Ajouter au panier</button>

								</form>

								</div>
							<?php
							}
							?>

			<!--
				<div id="produits">

					<div class="produits">

						<h2 id="cicolea"><img src="docs/photos/cicolea.png">,<br> une crème réparatrice et hydratante</h2><br><br>

						<img src="docs/photos/tube_cicolea.jpg" alt="creme cicolea" id="creme_cicolea2">

					<form action="" method="get">
  						<label for="quantity">Quantité:</label>
  						<input type="number" id="quantity" name="quantity" placeholder = "0" required><br><br>	
						<button type="submit" class="panier" >Ajouter au panier</button>
					</form>

					
							
					</div>

					<div class="produits">


						<h2 id="visolea"><img src="docs/photos/visolea.png">,<br> un cocktail vitaminé photoprotecteur d’actifs végétaux</h2>


						<img src="docs/photos/creme-visolea-lincantore-z.jpg" alt="creme_visolea" id="creme_visolea2">

					<form action="" method="get">
  						<label for="quantity">Quantité:</label>
  						<input type="number" id="quantity" name="quantity" placeholder = "0" required><br><br>	
						<button type="submit" class ="panier" >Ajouter au panier</button>
					</form>

						

					</div>
						
				</div>	


-->
			</div>

		</section>	
		

	</div>		


	<?php

		include ("footer.php");

	?> 

</body>
</html>