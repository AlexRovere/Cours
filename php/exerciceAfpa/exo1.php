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

$text = 'Hello World ! ';

for ($i = 5; $i > 1; $i--) {
    echo '<h'.$i.'>'.  $text . '</h' .$i. '>';
};
?>    
</body>
</html>
