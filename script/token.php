<?php

// Code pour se prévenir d'une faille CSRF

// Client

session_start();
$_SESSION['id'] = $_GET['id'];
unset($_SESSION['token']); // On vide le token lors d'un changement de session

if(!isset($_SESSION['token'])){ // SI aucun token
    $_SESSION['token'] = bin2hex(random_bytes(50)); // Génération d'un token aléatoire et unique dans la session 
    var_dump($_SESSION['token']);
}
?>

<a href="index/lienAproteger.php?delete=<?= $_SESSION['id'];?>&token=<?= $_SESSION['token'];?>">supprimer</a>

<?php

// Serveur

session_start();
if(isset($_GET['token']) && $_GET['token'] != $_SESSION['token']){ 
    die('Jeton de sécurité périmé');
}

else {
    // Déclenchement de la requete
}
