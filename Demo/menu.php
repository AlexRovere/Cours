<?php 
if (!function_exists('activeOnglet')) {

    function activeOnglet (string $lien = "", string $titre) :string { 
        $classe = 'nav-link';
        if ($_SERVER['SCRIPT_NAME'] === $lien) {
            $classe = $classe . ' active'; // OU $classe .= ' active';
        }
        return '<li class="nav-item">
        <a class="' . $classe . '" href="' . $lien . '">' . $titre . '</a>
        </li>';

    //     OU HEREDOC

    //     return <<<HTML
    //     <li class="nav-item">
    //     <a class="$classe" href="$lien">$titre</a>
    //     </li>
// HTML;
    }

}
?>
<?= activeOnglet("/demo/index.php", "Accueil");?>
<?= activeOnglet("/demo/contact.php", "Contact");?>
<?= activeOnglet("/demo/nombre.php", "Nombre");?>
<?= activeOnglet("/demo/checkbox.php", "Checkbox");?>
