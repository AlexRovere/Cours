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

			<h1>Nous contacter</h1>

			<form id="contact" method="post" action="traitement_contact.php">

				<div>

					<p>
						<label for="nom">Nom :</label>
						<input type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlenght="100" required>

						<label for="prenom">Prénom :</label>
						<input type="text" name="prenom" id="prenom" placeholder="Prénom" size="30" maxlenght="100" required>
					</p>
						
				</div>
				
				<div>		
					
					<p>	
						<label for="mail">E-mail :</label>
						<input type="mail" name="mail" id="mail" placeholder="@google.com" size="30" maxlength="100" required>

						<label for="telephone">Téléphone :</label>
						<input type="tel" name="telephone" id="telephone" placeholder="0123456789" size="30" maxlenght="100">
					</p>	
					
				</div>

				<div>

					<p>
						<label for="sujet">Sujet :</label>
						<input type="text" name="sujet" id="sujet" placeholder="information" size="30" maxlenght="100" required>
					</p>

				</div>		

				<div>		

					<p>
						<label for="message">Votre message :</label>
						<textarea name="message" id="message" placeholder="message" required></textarea>
					</p>
						
				</div>		
						
				<input class="bouton_envoyer" type="submit" id="ajouter" value="Envoyer">

				</div>	

			</form>

		</section>	
			
	</div>		

		
	<?php

		include ("footer.php");

	?> 

</body>
</html>
