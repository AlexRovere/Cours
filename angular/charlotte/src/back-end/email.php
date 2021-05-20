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
    $email = $data['email'];
    $pdf = $data['pdf'];
    $emailOrigine = 'wormz91000@gmail.com';
    $email_to = 'pastore.de.vardo.sacha@gmail.com';
    $email_subject = "Votre programme PDF";
    $email_message = "bonjour, merci d'avoir commandé sur notre site, vous trouverez ci-joint votre programme en pdf.";

    $headers = 'From: ' . $emailOrigine . "\r\n" .
        'Reply-To: ' . $emailOrigine . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($email_to, $email_subject, $email_message, $headers);

         echo json_encode([
        'success' => true]);

}

else {
    echo json_encode([
        'success' => false]);
}
