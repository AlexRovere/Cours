<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles2.css">
	<link rel="shortcut icon" href="images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<link rel="stylesheet" href="styles/jquery-ui.min.css">
  	<link rel="stylesheet" href="styles/theme.css">
	<script type="text/javascript" src="javascript.js"></script>
	<title>L’Ïncantore cosméceutiques, l'alliance du cosmétique et de la nature</title>
	
</head>

<body>

	<?php

		include ("header.php") ;

	?>

	<div id="bordure">	

		<h1>Actualités</h1>
			<!-- <section>

				<?php
							try
							{
								$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
							}
							catch(Exception $e)
							{
							        die('Erreur : '.$e->getMessage());
							}
							
							$reponse = $bdd->query('SELECT * FROM actu ');
					
							while ($donnees = $reponse->fetch())
							{
							?>

							<div id="liste_actu">
								<ul>
									<li>
									<a href="#<?php echo $donnees['titre']; ?>"><?php echo $donnees['date']; ?></a>
									</li>
								</ul>
							</div>
						<?php } ?>

			</section>!-->
			
			<section>				
				<div id="accordion">

				<?php		
							
				try
							{
								$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
							}
							catch(Exception $e)
							{

							        die('Erreur : '.$e->getMessage());
							}

							$reponse = $bdd->query('SELECT * FROM actu ');

							while ($donnees = $reponse->fetch())
							{
								
							?>


									<h3 ><?php echo $donnees['titre'];?></h3>
									<div>
									<img src="docs/actualités/<?php echo $donnees['texte']; ?>" alt="photo <?php echo $donnees['titre']; ?>" title="photo" id="photo_actu">
									</div>
								
							<?php
							}
							?>
							</div>	


		</section>	
					
	</div>	
		
	<?php

		include ("footer.php");

	?> 

</body>
</html>

