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

		<div class="div_marge">

		<h1>Avis</h1>

		
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

					$reponse = $bdd->query('SELECT avis.* ,produits.nom as produit   FROM `avis`  INNER JOIN `produits` ON avis.produit_id=produits.produit_id ');

					while ($donnees = $reponse->fetch())
					{
								
			?>
		
			<div id="liste_avis">	

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

			</div>	

			<p id="message_avis"><?php echo htmlspecialchars($donnees ['message']); } ?> </p>	
		

		</section>













		<section>	
			
			<form id="avis" method="post" action="traitement_avis.php">
			
				<div>	

					<p>

						<label for="nom">Nom :</label>
						<input type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlenght="100" required>


						<label for="email">Ville :</label>
						<input type="text" name="ville" id="ville" placeholder="Paris" size="30" maxlength="100" required>

					</p>

				</div>

				<div>	

					<p>	

					 	<label for="produit">Produit :</label>
				        <select name="produit" id="produit" required>

				   			<option value="2">Cicolea</option>
				        	<option value="1">Visolea</option>
				        
				        </select>
		

				        <label for="note">Note :</label>
				        <select name="note" id="note" required>

				   			<option value="5">5/5</option>
				        	<option value="4">4/5</option>
				        	<option value="3">3/5</option>
				            <option value="2">2/5</option>
				            <option value="1">1/5</option>
				            <option value="0">0/5</option>

				        </select>

				        <label for="date">Date :</label>	
				        <input type="date" name="date" id="date" />
				 
				<div>
						
						<label for="message">Votre message :</label>
						<textarea name="message" id="message" placeholder="message" required></textarea>
						
					</p>	

						<input class="bouton_envoyer" id="ajouter" name="ajouter" type="submit" value="Envoyer">
				
				</div>	

			</form>

		</section>

		</div>
	</div>		

	<?php

		include ("footer.php");

	?> 

</body>
</html>
