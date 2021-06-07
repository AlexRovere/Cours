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


		<?php

			$nom = $_POST['nom'];
			$date = $_POST['date'];
			$ville = $_POST['ville'];
			$produit_id = $_POST['produit'];
			$note = $_POST['note'];
			$message = $_POST['message'];

			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
					die('Erreur : '.$e->getMessage());
			}

		         if (isset($_POST['ajouter']))
		         { 
		         	$sql="INSERT INTO `avis` (`nom`, `date`, `ville`, `produit_id`, `note`, `message`) VALUES ('".$nom."', '".$date."', '".$ville."', '".$produit_id."', '".$note."', '".$message."')";
		         	$query = $bdd->query($sql);
		         	$query->closeCursor();
		         	echo 'Message envoyé';
		         }
		         else {

		         	echo 'erreur';
      			
		         }
		?>      


	</div>		

	<?php

		include ("footer.php");

	?> 

</body>