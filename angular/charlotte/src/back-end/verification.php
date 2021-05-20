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

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/oauth2/token',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Basic QWM3N3lWQi03YmM2MTBxc1hhaDVLMTJGa3NnVFJzclhPWDlXTlIyUkw0b09VNDVJMGNXOWNaWVhnRzBlWndudDVGdU5pa0hqbmpON0E0YVk6RUtkTU8zVnd3bk5QRldwOTBBUW8zTklWcXBiWF84bEoxWFV5dXFONC1RU1dpQUgyTHJZcmxKd0lRYzh0S2pCWDBxdXlXNEFyQjhBYnJCS1U=',
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    json_decode($response, true);

    try {
    echo json_encode([
        "success" => true,
        "resultat" => $data,
        "token" => $response['access_token']
    ]);
    } catch(Exception $e){
        echo json_encode([
            "success" => false,
            "error" => $e
        ]);
    
    die('Erreur : ' . $e->getMessage());
}
}

?>
