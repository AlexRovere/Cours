<?php 
$env = getenv();
$date = getdate();
var_dump($env, $date);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "Bienvenue sur le serveur " . $env['PROCESSOR_IDENTIFIER'] . " , nous sommes le " . $date['mday'] . '/' .  $date['mon']  . '/' . $date['year'];
    ?>
</body>
</html>
