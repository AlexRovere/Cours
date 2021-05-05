<?php
$host = 'localhost';
$bdd = 'concerts';
$user = 'root';
$password = '';

try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('erreur de connexion' . $e->getMessage());
}

$req = $bdd->prepare('SELECT id_concert, DATE_FORMAT(date, "%d/%m/%Y") as date, lieu, groupe, note FROM concert');
$req->execute();
$data = $req->fetchAll();


