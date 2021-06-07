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

		<h1>Point de vente</h1>


	
		<label for="departement">Rechercher par département :</label>

			<select name="departement" id="departement" required onchange="document.location.href='vente.php?id=' + this.value;">

			<?php
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}

					$reponse = $bdd->query('SELECT distinct departement FROM point');

					while ($donnees = $reponse->fetch())
					{				
					?> 
						<option value="<?php echo $donnees['departement'];?>"><?php echo $donnees['departement']; ?></option>
					<?php } ?>
		
					
			</select>



			<section id="pharmacie">		

				<?php
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}

					if (isset($_GET['id'])){
						$reponse = $bdd->query('SELECT * FROM point where departement='.$_GET['id']);	
					}else{
						$reponse = $bdd->query('SELECT * FROM point');
					}

					while ($donnees = $reponse->fetch())
					{
					
					?>

					
				

						<ul id="liste_pharmacie">

						
							<li><?php echo $donnees['nom_pharmacie'];?></li>
							<li><?php echo $donnees['nom_medecin'];?></li>
							<li><?php echo $donnees['adresse'];?></li>
							<li><?php echo $donnees['departement'];?></li>
							<li><?php echo $donnees['ville'];?></li>
							<li><?php echo $donnees['mail'];?></li>
							<li><?php echo $donnees['telephone'];?></li>

						</ul>	

					
						
					<?php
					}
					?>

<!--				
			<label for="departement">Rechercher par département :</label>
			<select name="departement" id="departement" required>

			   	<option value="5">5/5</option>
			    <option value="4">4/5</option>
			    <option value="3">3/5</option>
			    <option value="2">2/5</option>
			    <option value="1">1/5</option>
			    <option value="0">0/5</option>

			</select>

-->
			

		</section>

	</div>		


	<?php
		
		include ("footer.php");

	?> 

</body>
</html>