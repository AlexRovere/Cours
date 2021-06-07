<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Request-Headers: *");
// header("Content-Type: application/json; charset=UTF-8");

try {
    $bdd = new PDO('mysql:host=localhost; dbname=angular-stripe;charset=UTF8', 'root', ''); // BDD EN LIGNE
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->query('SELECT * FROM produit');
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
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
