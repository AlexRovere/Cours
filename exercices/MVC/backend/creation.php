<?php
$host = 'localhost';
$bdd = 'concerts';
$user = 'root';
$password = '';
$lieu = htmlspecialchars(implode([$_POST['lieu']]));
$groupe = htmlspecialchars(implode([$_POST['groupe']]));
$note = htmlspecialchars(implode([$_POST['note']]));
$date = htmlspecialchars(implode([$_POST['date']]));

try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('erreur de connexion' . $e->getMessage());
}

if (isset($lieu, $groupe, $note) && $date != null)
{
$req = $bdd->prepare('INSERT INTO concert (lieu, groupe, date, note) VALUES (:lieu, :groupe, :date, :note)');
$req->bindParam(':lieu', $lieu);
$req->bindParam(':groupe', $groupe);
$req->bindParam(':date', $date);
$req->bindParam(':note', $note);
$req->execute();
}

header('Location: ../frontend/index.php');
