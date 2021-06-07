<?php
 include("header.php")
?>

<form id="contact" method="post" action="traitement.php">

	<p>
		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" placeholder="Pierre">
	</p>
	<p>
		<label for="sujet">Sujet :</label>
		<input type="text" name="sujet" id="sujet" placeholder="Suggestion">
	</p>
	<p>
		<label for="message">Message :</label>
		<textarea name="message" id="message"></textarea>
	</p>	

	<input class="bouton_envoyer" type="submit" name="ajouter" value="Envoyer">

</form>

<?php
include("footer.php")
?>