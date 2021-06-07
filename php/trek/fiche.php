<?php 
include("header.php")
?>

<?php

	try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=trek;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{

					        die('Erreur : '.$e->getMessage());
					}

					$reponse = $bdd->query('SELECT * FROM article where id_article='.$_GET['id']);

					while ($donnees = $reponse->fetch())

					{
						
					?>

	<h1><?php echo $donnees['titre']; ?></h1>		

	<img class="image_float"src=<?php echo $donnees['image'];?>>

	<p class="contenu"><?php echo $donnees['contenu'];?> </p>

	<p class="auteur">Publié par <?php echo $donnees['auteur'];?>, le <?php echo $donnees['date'];?></p>

<?php
}
?>


<?php 
include("footer.php")
?>
