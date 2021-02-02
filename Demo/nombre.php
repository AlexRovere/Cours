<?php
$aDeviner = 150;
$erreur = null;
$succes = null;
$value = null;
if (isset($_POST['chiffre'])) {
    $value = (int)$_POST['chiffre'];
    if ($value > $aDeviner) {
        $erreur = "Votre chiffre est trop grand, essayez encore ! ";
    }
    else if ($value < $aDeviner) {
        $erreur = "Votre chiffre est trop petit, essayez encore ! ";
    }
    else {
        $succes = "Bravo ! Le chiffre était bien $aDeviner ";
    }
    $value = (int)$_GET['chiffre'];
}
require 'header.php';
?>

<?php if ($erreur): ?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php elseif ($succes): ?>
    <div class="alert alert-success">
    <?= $succes ?>
</div>
<?php endif ?>

<?php
/*
VERSION 2

<?php if ($_GET['chiffre'] > $aDeviner): ?>
    Votre chiffre est trop grand, essayez encore !
<?php elseif ($_GET['chiffre'] < $aDeviner): ?>
    Votre chiffre est trop petit, essayez encore ! 
<?php else: ?>
    Bravo ! Le chiffre était bien <?= $aDeviner ?> ! 
<?php endif ?>
*/?>

<form action="jeu.php" method="POST">
    <div class="form-group">
        <input type="number" name="chiffre" placeholder="Entre 0 et 1000" value="<?= $value ?>">
    </div>
    <button type="submit" class="btn btn-primary">Deviner</button>
</form>

<h2>$_GET<h2>
<pre>
<?php var_dump($_GET) ?>
</pre>

<h2>$_POST<h2>
<pre>
<?php var_dump($_POST) ?>
</pre>

<?php require 'footer.php'?>
