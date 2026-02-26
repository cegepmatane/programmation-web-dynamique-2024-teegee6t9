<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$titre = "Panneau d'administration";
require 'header.php';

// Récupère les données POST
$FILTRES_HEROS = [
    'id_heros' => FILTER_DEFAULT,
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
];

$heros = filter_input_array(INPUT_POST, $FILTRES_HEROS);

// -------------------------
// Traitement des images
// -------------------------

$icon = "";
$gi = "";

// Pour ICON : s'il y a un nouveau fichier
if (!empty($_FILES["icon"]["name"])) {
    $dossierCibleIcon = "../images/mini/";
    $fichierCibleIcon = $dossierCibleIcon . basename($_FILES["icon"]["name"]);
    if (
        preg_match("#png|jpg|jpeg#", $_FILES['icon']['type'])
        && $_FILES['icon']['size'] <= 5000000
        && !file_exists($fichierCibleIcon)
    ) {
        move_uploaded_file($_FILES["icon"]["tmp_name"], $fichierCibleIcon);
        $icon = $_FILES["icon"]["name"];
        echo "<h3>Icone envoyée</h3>";
    } else if (!empty($_FILES['icon']['name'])) {
        echo "<h3>Le format de l'icone n'est pas valide ou icone trop volumineuse/déjà existante</h3>";
    }
}
if (empty($icon)) {
    $icon = $heros['icon_origine'];
}

// Pour GI
if (!empty($_FILES["gi"]["name"])) {
    $dossierCibleGi = "../images/";
    $fichierCibleGi = $dossierCibleGi . basename($_FILES["gi"]["name"]);
    if (
        preg_match("#png|jpg|jpeg#", $_FILES['gi']['type'])
        && $_FILES['gi']['size'] <= 5000000
        && !file_exists($fichierCibleGi)
    ) {
        move_uploaded_file($_FILES["gi"]["tmp_name"], $fichierCibleGi);
        $gi = $_FILES["gi"]["name"];
        echo "<h3>Grande illustration envoyée</h3>";
    } else if (!empty($_FILES['gi']['name'])) {
        echo "<h3>Le format de l'image n'est pas valide ou image trop volumineuse/déjà existante</h3>";
    }
}
if (empty($gi)) {
    $gi = $heros['gi_origine'];
}

// -------------------------
// Préparer le tableau pour Firestore
// -------------------------

$idHeros = $heros['id_heros'];
$heros['icon'] = $icon;
$heros['gi'] = $gi;

// L’appel Firestore PATCH
$reussiteModifierHeros = HerosDAO::modifierHeros($idHeros, $heros);

// -------------------------
// Affichage du résultat
// -------------------------

if ($reussiteModifierHeros) {
    ?>
    <div class="container">
        <h3>Votre Héros a été modifié dans la base de données</h3>
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
?>