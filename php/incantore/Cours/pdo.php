 <?php
            $nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$mail=$_POST['mail'];
			$telephone=$_POST['telephone'];
			$sujet=$_POST['sujet'];
			$message=$_POST['message'];
			
			$servname = 'localhost';
            $dbname = 'formation';
            $user = 'root';
            $pass = '';
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=formation;charset=utf8', $user, $pass );
			}
			catch(Exception $e)
			{
					die('Erreur : '.$e->getMessage());
			}
            
            try{
                

               // $bdd->beginTransaction();
                
				//avec query
				$sql="SELECT contact_id FROM contact WHERE mail='".$mail."'"; '$mail'
                $sth = $bdd->query($sql);
				
				//requête préparée avec marqueurs interrogatifs et tableau de valeurs de paramètres execute(array)
				//$sth = $bdd->prepare("SELECT contact_id FROM contact WHERE mail=?");
				//$sth->execute(array($mail));
				
				//requête préparée avec marqueurs nommés et tableau de valeurs de paramètres execute(array)
				//$sth = $bdd->prepare("SELECT contact_id FROM contact WHERE mail=:mail");
				//$sth->execute(array(':mail' => $mail);
				
                //requête préparée avec marqueurs nommés En utilisant bindValue  pour lier des valeurs à des paramètres 
				//$sth = $bdd->prepare("SELECT contact_id FROM contact WHERE mail=:mail");
				 //$sth->bindValue(':mail', $mail);
				 //$sth->execute();
				 
			   //requête préparée avec marqueurs interrogatifs En utilisant bindValue  pour lier des valeurs à des paramètres 
				//$sth = $bdd->prepare("SELECT contact_id FROM contact WHERE mail=?");
				 //$sth->bindValue(1, $mail,PDO ::PARAM_STR);
				 //$sth->execute();
				
				/*
				if($sth->fetchColumn()==false){
				
					$sql="INSERT INTO `contact`(`nom`, `prenom`, `mail`, `telephone`) VALUES('".$nom."','".$prenom."','".$mail."', '".$telephone."')";
					$query = $bdd->query($sql);
					//$query->closeCursor(); 
					

					$sql="SELECT  contact_id FROM contact order by contact_id desc limit 1";
					$query = $bdd->query($sql);
					while ($donnees = $reponse->fetch()){
						$contact_id=$donnees['contact_id'];
					}

			}
			else{
				while ($donnees = $sth->fetch()){
					$contact_id=$donnees['contact_id'];
				}
			}
                */
             
				
               // $bdd->commit();
                echo 'Entrées ajoutées dans la table';
            }
            
            catch(PDOException $e){
              //  $bdd->rollBack();
              echo "Erreur : " . $e->getMessage();
            }
        ?>