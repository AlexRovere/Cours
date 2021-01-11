
	<?php

		include ("header.php") ;

	?>
	
		<article>
	

		<h1>Bienvenue sur le blog des treks dans le mercantour</h1>
		
	<p>Vous trouverez ici des ressources pour vous accompagner dans vos futurs voyages, vous pouvez également partager vos expériences via notre forum.<br>
	Je vous invite également à me contacter sur <a href="mailto:alex.rovere@hotmail.fr"><strong>ma boite mail</strong></a>, si vous voulez rajouter un article complet ! Bonne visite ;)</p>		

		</article>

	<div class="separation">

	

		<section>
			<h2>Articles en ligne</h2>
			<div class="article">
				<article>
					<img class="article_photo" src="images/prep.jpeg">
					<h3>10 conseils avant de partir en trek</h3>
					<p><a href="préparation.php"><span class=bouton>Préparation</span></a>  10.11.2020</p>
			</article>
			<article>
					<img class="article_photo" src="images/tarp.jpeg">
					<h3>Les avantages/inconvénients du tarp</h3>
					<p><a href="matériel.php"><span class=bouton>Matériel</span></a> 08.11.2020</p>
			</article>
		
			</div>
		</section>	

		<section id="moi">
		<h2>A propos de moi</h2>
		<p>Passionné de nature et de voyage, je me suis lancé de le trek il y a 3 ans avec mon petit frère Antoine.</p>
		</section>

	</div>
	<br>
	<p>Et aussi...</p>
	<br>
	<div class="article">
		<article>
					<img class="article_photo" src="images/nourriture.jpeg">
					<h3>Quel alimentation choisir?</h3>
					<p><a href="alimentation.php"><span class=bouton>Alimentation</span></a> 27.10.2020</p>
			</article>
			
			<article>
					<img class="article_photo" src="images/baton.jpeg">
					<h3>Baton de rando ou non?</h3>
					<p><a href="matériel.php"><span class=bouton>Matériel</span></a> 22.10.2020</p>
			</article>

			<article>
					<img class="article_photo" src="images/comp.jpeg">
					<h3>Complément alimentaire</h3>
					<p><a href="alimentation.php"><span class=bouton>Alimentation</span></a> 10.10.2020</p>
			</article>

			
					<?php
							try
							{
								$bdd = new PDO('mysql:host=localhost;dbname=trek;charset=utf8', 'root', '');
							}
							catch(Exception $e)
							{

							        die('Erreur : '.$e->getMessage());
							}

							$reponse = $bdd->query('SELECT * FROM article ');

							while ($donnees = $reponse->fetch())
							{
								
							?>

			<article>
				<img class="article_photo"src="<?php echo $donnees["image"];?>">
				<h3><?php echo $donnees["titre"]?></h3>	
				<p><a href=fiche.php?id=<?php echo $donnees['id_article']?>><span class=bouton><?php echo $donnees['categorie']?></span></a> <?php echo $donnees['date']?></p>			
							
			</article>

		<?php
		 } 
		 ?>
	</div>		

	
<?php 

	include("footer.php");

?>