<?php

$fichier = __DIR__ . DIRECTORY_SEPARATOR . '../demo.text';
$handle = fopen('C:\wamp64\www\Projets\Demo\data\menu.tsv', "r+");
$i = 0;
$menu = [];


if ($handle) {
    while (!feof($handle)) {
        $line = explode('   ', fgets($handle));
        print_r($line);
        $menu = array_push($line);
    }
}


print_r($menu);

// $size = @file_put_contents($fichier, $titrePizza);
// if ($size === false) {
//     echo 'Impossible d\'écrire dans le fichier';
// } else {
//     echo 'Ecriture réussie';
// } 
