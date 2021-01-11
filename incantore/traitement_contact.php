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
		
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$mail=$_POST['mail'];
			$telephone=$_POST['telephone'];
			$sujet=$_POST['sujet'];
			$message=$_POST['message'];
	

			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
					die('Erreur : '.$e->getMessage());
			}


			$reponse = $bdd->prepare("SELECT contact_id FROM contact WHERE mail=?");
			$reponse->execute(array($mail));


			if($donnees = $reponse->fetch()){
				$contact_id = $donnees['contact_id'];
			}	
			//sinon recherche de l'id du mail envoyé pour l'insérer dans la table message	
			else{
				//Si aucun mail dans la table contact, ajout dans celle-ci

					$reponse = $bdd->prepare("INSERT INTO `contact`(`nom`, `prenom`, `mail`, `telephone`) VALUES(:nom, :prenom, :mail, :telephone)");
					$reponse->execute(array('nom' =>$nom, 'prenom' =>$prenom, 'mail' =>$mail, 'telephone' =>$telephone));
					$reponse->closeCursor();

					//selection du dernier id ajouter dans contact pour l'insérer dans la table message	
					$sql="SELECT contact_id FROM contact order by contact_id desc limit 1";
					$query = $bdd->query($sql);
					while ($donnees = $query->fetch()){
					$contact_id = $donnees['contact_id'];
					$query->closeCursor(); 
					}
			}

			//Envoi du message + l'id du contact dans la table messages

					$reponse = $bdd->prepare("INSERT INTO messages (message, contact_id, sujet) VALUES(:message, :contact_id, :sujet)");
					$reponse->execute(array('message' =>$message, 'contact_id' =>$contact_id, 'sujet' =>$sujet));
					$reponse->closeCursor();
					echo 'Message envoyé'; 

			
		    /*$body="Contenu du formulaire\n\n";
			$body .= 'Nom : '.$nom."\n";
			$body .= 'Prénom : '.$prenom."\n";
			$body .= 'Téléphone : '.$telephone."\n";
			$body .= 'Email : '.$mail."\n";
			$body .= 'Message : '.$message."\n";

			$xEmailed=FALSE;
			$xEmailed = mail("alex.rovere@hotmail.fr",$sujet,$body);*/
		?>


	</div>		

	<?php

		include ("footer.php");

	?> 

</body>		