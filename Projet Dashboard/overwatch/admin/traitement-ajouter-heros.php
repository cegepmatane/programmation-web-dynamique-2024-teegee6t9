<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$titre = "Panneau d'administration";
require 'header.php';
require '../traitement-image.php';


$FILTRES_HEROS = array(
    'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
    'classe' => FILTER_SANITIZE_SPECIAL_CHARS,
    'pv' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description_courte' => FILTER_SANITIZE_SPECIAL_CHARS,
    'habilite1' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description_habilite1' => FILTER_SANITIZE_SPECIAL_CHARS,
    'habilite2' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description_habilite2' => FILTER_SANITIZE_SPECIAL_CHARS,
    'ultimate' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description_ultimate' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description_longue' => FILTER_SANITIZE_SPECIAL_CHARS,
    'icon' => FILTER_SANITIZE_SPECIAL_CHARS,
    'gi' => FILTER_SANITIZE_SPECIAL_CHARS,
);


$heros = filter_input_array(INPUT_POST, $FILTRES_HEROS);

$reussiteAjout = HerosDAO::ajouterHeros($heros);

if ($reussiteAjout) {
?>
    <div class="container">
        <h3>Votre héros a été ajouté à la base de données</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
<?php
} else {
?>
    <div class="container">
        <h3>Votre envoi de fichier a échoué</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
<?php
}

require "../footer.php";
?>