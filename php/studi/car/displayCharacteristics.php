<?php

function displayCharacteristics(CharacteristicsDisplayable $charac)
{
    foreach ($charac as $key => $value) {
        echo '<li>' . $key . ' : ' . $value . '</li>';
    }
}
