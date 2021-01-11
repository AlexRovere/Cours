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
		include("header.php") ;
?>
<div id="bordure">		
		<?php
		
			
		
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{

					        die('Erreur : '.$e->getMessage());
					}

					$reponse = $bdd->query('SELECT * FROM sources where source_id='.$_GET['id']);

					while ($donnees = $reponse->fetch())
					{
						
					?>

						<div class="div_marge">

							<h1><?php echo $donnees['nom']; ?></h1>
							<img src="docs/photos/<?php echo $donnees['photo_max']; ?>" alt="photo <?php echo $donnees['nom']; ?>" title="photo <?php echo $donnees['nom']; ?>" class="photo_source">

							<p class="p_center"><?php echo $donnees['descriptif']; ?></p>
						</div>
		<?php
		}

					include("footer.php") ;

					
					?>
				</div>
	</body>
</html>