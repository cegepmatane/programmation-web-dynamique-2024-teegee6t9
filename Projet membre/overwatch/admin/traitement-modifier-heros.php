<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$titre = "Panneau d'administration";
require 'header.php';
require '../traitement-image.php';

$FILTRES_HEROS = array(
    'id_heros' => FILTER_SANITIZE_NUMBER_INT,
    'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
    'classe' => FILTER_SANITIZE_SPECIAL_CHARS,
    'pv' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description_courte' => FILTER_SANITIZE_ADD_SLASHES,
    'habilite1' => FILTER_SANITIZE_ADD_SLASHES,
    'description_habilite1' => FILTER_SANITIZE_ADD_SLASHES,
    'habilite2' => FILTER_SANITIZE_ADD_SLASHES,
    'description_habilite2' => FILTER_SANITIZE_ADD_SLASHES,
    'ultimate' => FILTER_SANITIZE_ADD_SLASHES,
    'description_ultimate' => FILTER_SANITIZE_ADD_SLASHES,
    'description_longue' => FILTER_SANITIZE_ADD_SLASHES,
    'icon_origine' => FILTER_SANITIZE_SPECIAL_CHARS,
    'gi_origine' => FILTER_SANITIZE_SPECIAL_CHARS
);

$heros = filter_input_array(INPUT_POST, $FILTRES_HEROS);

if (empty($icon)) {
    $icon = $heros['icon_origine'];
}

if (empty($gi)) {
    $gi = $heros['gi_origine'];
}

$reussiteModifierHeros = HerosDAO::modifierHeros($heros, $icon, $gi);




if ($reussiteModifierHeros) {
?>
    <div class="container">
        <h3>Votre Héros a été modifier à la base de données</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
<?php
} else {
?>
    <div class="container">
        <h3>Votre modification de fichier a échoué</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
<?php

}

require "../footer.php";
