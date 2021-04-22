<?php
    function incrementation()
    {
   $i = 0; // Si c'est le premier appel de la fonction, initialisation de la variable.
        $i++;
        echo $i;
    }

    incrementation(); // Affiche « 1 ».
    incrementation(); // Affiche « 2 ».
    incrementation(); // Affiche « 3 ».
    incrementation(); // Affiche « 4 ».
    incrementation(); // Affiche « 5 ».
?>
