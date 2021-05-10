<?php
$host = 'localhost';
$bdd = 'tp_blog';
$user = 'root';
$password = '';
$titre = htmlspecialchars(implode([$_POST['titre']]));
$contenu = htmlspecialchars(implode([$_POST['contenu']]));
$dateCreation = htmlspecialchars(implode([$_POST['dateCreation']]));
$categorie = htmlspecialchars(implode([$_POST['categorie']]));
$statut = htmlspecialchars(implode([$_POST['statut']]));

try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('erreur de connexion' . $e->getMessage());
}

if (isset($titre, $contenu, $dateCreation, $categorie, $statut) && $dateCreation != null)
{
$req = $bdd->prepare('INSERT INTO tp_blog (titre_article, contenu_article, date_creation_article, categorie_id_categorie, statut_id_statut) VALUES (:titre, :contenu, :dateCreation, :categorie, :statut)');
$req->bindParam(':titre', $titre);
$req->bindParam(':contenu', $contenu);
$req->bindParam(':dateCreation', $dateCreation);
$req->bindParam(':categorie', $categorie);
$req->bindParam(':statut', $statut);
$req->execute();
}
else if (isset($titre, $contenu, $dateCreation, $categorie, $statut) && $dateCreation != null && $statut == 2)

$datePublication = $dateCreation;
{
    $req = $bdd->prepare('INSERT INTO tp_blog (titre_article, contenu_article, date_creation_article, categorie_id_categorie, statut_id_statut, date_publication_article) VALUES (:titre, :contenu, :dateCreation, :categorie, :statut, :datePublication)');
    $req->bindParam(':titre', $titre);
    $req->bindParam(':contenu', $contenu);
    $req->bindParam(':dateCreation', $dateCreation);
    $req->bindParam(':categorie', $categorie);
    $req->bindParam(':statut', $statut);
    $req->bindParam(':datePublication', $datePublication);
    $req->execute();
}

header('Location: ../frontend/index.php');
