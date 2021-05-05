<?php

$curl = curl_init('api.openweathermap.org/data/2.5/weather?q=Toulon&appid=b6668a9eea5fb863283b0927ac82f222'); // CONNEXION A L'API avec la clée 
curl_setopt($curl, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer'); // Certificat SSL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Assignantion de la valeur de retour dans une variable
$data = curl_exec($curl); // Execution des requetes

if ($data == false) {
    var_dump(curl_error($curl));
}
curl_close($curl); // Fermeture de la requete

var_dump($data);
?>
