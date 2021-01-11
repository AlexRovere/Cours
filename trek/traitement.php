<?php
include("header.php")
?>

<?php
	$nom=$_POST['nom'];
	$sujet=$_POST['sujet'];
	$message=$_POST['message'];

	try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=trek;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
					die('Erreur : '.$e->getMessage());
			}

		         if (isset($_POST['ajouter']))
		         { 
		         	$sql="INSERT INTO `contact` (`nom`, `sujet`, `message`) VALUES ('".$nom."', '".$sujet."','".$message."')";
		         	$query = $bdd->query($sql);
		         	$query->closeCursor();
		         	echo 'Message envoyé';
		         }
		         else {

		         	echo 'erreur';
      			
		         }
		?>      


<?php
include("footer.php")
?>