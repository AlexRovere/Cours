<?php
require 'header.php';
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
$title = "Composter votre glace";
$ingredients = [];
$total = 0;

if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) {
        if(isset($parfums[$parfum]));{
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}

if (isset($_GET['supplement'])) {
    foreach ($_GET['supplement'] as $supplement) {
        if(isset($supplements[$supplement]));{
            $ingredients[] = $supplement;
           $total += $supplements[$supplement];
        }
    }
}

if (isset($_GET['cornet'])) {
    $cornet = $_GET['cornet'];
        if(isset($cornets[$cornet]));{
            $ingredients[] = $cornet;
            $total += $cornets[$cornet];
    }
}



?>

<h1>Composez votre glace</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <?php foreach ($ingredients as $ingredient) :?>
                    <li><?=$ingredient?></li>
                    <?php endforeach ;?>
                    <li>Le prix total est de : <?= $total ?> €
                </ul>
            </div>
        </div>    
    </div>
    <div class="col-md-8">
        <form action="checkbox.php" method="GET">
            <?php foreach($parfums as $parfum => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('parfum', $parfum, $_GET);?>
                    <?= $parfum . " à " . $prix . " €"; ?>
                </label>
            </div>
            <?php endforeach; ?>
            <hr>
            <?php foreach($cornets as $cornet => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= radio('cornet', $cornet, $_GET);?>
                    <?= $cornet . " à " . $prix . " €"; ?>
                </label>
            </div>
            <?php endforeach; ?>
            <hr>
            <?php foreach($supplements as $supplement => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('supplement', $supplement, $_GET);?>
                    <?= $supplement . " à " . $prix . " €"; ?>
                </label>
            </div>
            <?php endforeach; ?>
            <hr>
            <button type="submit" class="btn btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>


<hr>







<?php require 'footer.php'?>

