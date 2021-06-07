<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Request-Headers: *");
header("Content-Type: application/json; charset=UTF-8");

// On recupere le ficher JSON et on le stock dans $postdata
$postdata = file_get_contents('php://input');

// Si $postdata existe et n'est pas vide alors on decode le ficher et on extraie les informations qu'il contient
if (isset($postdata) && !empty($postdata)) {

    $data = json_decode($postdata, true);
    $id = $data['id'];

    try {
        $bdd = new PDO('mysql:host=localhost; dbname=angular-stripe;charset=UTF8', 'root', ''); // BDD EN LIGNE
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $bdd->prepare('SELECT * FROM produit WHERE id= :id');
        $req->bindParam(':id', $id);
        $req->execute();
        $data = $req->fetch();
        echo json_encode([
            'success' => true,
            'produit' => $data
        ]);
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'error' => $e
        ]);
        die('Erreur : ' . $e->getMessage());
    }
}
