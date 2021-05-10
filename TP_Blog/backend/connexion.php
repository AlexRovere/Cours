<?php
$host = 'localhost';
$bdd = 'tp_blog';
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

$req = $bdd->prepare('SELECT id_article, DATE_FORMAT(date_publication_article, "%d/%m/%Y") as datePublication FROM article');
$req->execute();
$data = $req->fetchAll();


