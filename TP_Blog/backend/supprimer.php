<?php
$host = 'localhost';
$bdd = 'concerts';
$user = 'root';
$password = '';
$id = htmlspecialchars($_GET['id']);

try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('erreur de connexion' . $e->getMessage());
}

if(isset($id))
{
$req = $bdd->prepare('DELETE FROM concert WHERE id_concert = :id');
$req->execute(['id' => $id]);
}

header('Location: ../frontend/index.php');


