<?php
// Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
// Radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
// Checkbox
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5
];

if(isset($_GET['cornet'])) {
    $parfumsChoisi = $_GET['parfum'];
    $cornetChoisi = $_GET['cornet'];
    $supplementChoisi = $_GET['supplement'];
    $prixTotal = 0;
    
    $test = array_diff($parfumsChoisi, $parfums);
    $somme = array_sum($test);

print_r($parfumsChoisi);
print_r($test);
print_r($somme);
}
require 'header.php';
?>

<form action="checkbox.php" method="GET">
    <div class="form-group">
        <input type="checkbox" name="parfum[]" value="fraise"> fraise<br>
        <input type="checkbox" name="parfum[]" value="vanille"> vanille<br>
        <input type="checkbox" name="parfum[]" value="chocolat"> chocolat<br>
    </div>
<hr>
    <div class="form-group">
        <input type="radio" name="cornet" value="pot"> Pot<br>
        <input type="radio" name="cornet" value="cornet"> Cornet<br>
    </div>
<hr>
    <div class="form-group">
        <input type="checkbox" name="supplement[]" value="pepite"> Pépites de chocolat<br>
        <input type="checkbox" name="supplement[]" value="chantilly"> Chantilly<br>
    </div>
<hr>    
    <button type="submit" class="btn btn-primary">Acheter</button>
</form>




<hr>





<h2>$_GET<h2>
<pre>
<?php var_dump($_GET) ?>
</pre>

<h2>$_POST<h2>
<pre>
<?php var_dump($_POST) ?>
</pre>

<?php require 'footer.php'?>

