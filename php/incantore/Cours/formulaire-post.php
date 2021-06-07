<?php
	$nom=$_POST['nom'];
	$id=$_POST['id'];
	$prix=$_POST['prix'];
	$description=$_POST['description'];
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=incantore;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}



        if (isset($_POST['ajouter'])){
			$sql="INSERT INTO `produits`(`nom`, `prix`, `mode`) VALUES ('".$nom."',".$prix.",'".$description."')";
          	//execute_query($sql,$bdd);
          	echo $sql;
            $result='Ajout effectuée...';
            $query = $bdd->query($sql);
			$query->closeCursor();
        }
       elseif (isset($_POST['modifier']))                     
        {
		   $sql="UPDATE `produits` SET `nom`='".$nom."',`prix`=".$prix.",`description`='".$description."' WHERE produit_id=".$id;
		   //execute_query();
		  $result= "Modification effectuée...";
	 }
       elseif(isset($_POST['supprimer']))       
		{
			 $sql="delete  FROM produits  where produit_id =".$id;
			//execute_query();
			 $result= 'Suppression effectuée...';
		
		}

/*
		$query = $bdd->query($sql);
		$query->closeCursor();
		echo $result;
*/
	function execute_query($variable,$b)
	{
		echo $variable;
		$query = $b->query($variable);
		$query->closeCursor();
	} ;

?>