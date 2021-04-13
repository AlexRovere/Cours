<?php


function loadClass($classe) {
    require $classe . '.php';
}

spl_autoload_register('loadClass');

$bob = new Personnage (10, 30);
