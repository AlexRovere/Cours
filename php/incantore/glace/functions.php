<?php
function checkbox (string $name, string $value, array $data ) :string {
    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
    $attributes .= 'checked';
    }
    return <<<HTML
    <input type ="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}

function radio (string $name, string $value, array $data ) :string {
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]) {
    $attributes .= 'checked';
    }
    return <<<HTML
    <input type ="radio" name="{$name}" value="$value" $attributes>
HTML;
}

function dump ($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

function creneaux_html (array $creneaux) {
    if (count($creneaux) === 0) {
        return "Fermé";
    }
    $phrases = [];
   
    foreach ($creneaux as $creneau) {
        $phrases[] = "  <strong>{$creneau[0]} h</strong> à  <strong>{$creneau[1]} h</strong>";
    }
    return "Ouvert de " . implode(' et ', $phrases);    
}

function in_creneaux(int $heure, array $creneaux):bool {
    foreach ($creneaux as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin) {
            return true;
        } 
    }
    return false;
}

function select (string $name, $value, array $options) :string {
    foreach($options as $k => $option) {
        $attributes = $k == $value ? 'selected' : '';
        $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    return "<select class='form-control' name='$name'" . implode($html_options) . '</selected>';
}
