<?php
include "../basededonnees.php";
$titre = "Panneau d'administration";
require 'header.php';
require 'traitement-image.php';

$idHeros = $_POST['id_heros'];
$nom = $_POST['nom'];
$classe = $_POST['classe'];
$pv = $_POST['pv'];
$description_courte = addslashes($_POST['description_courte']);
$habilite1 = addslashes($_POST['habilite1']);
$description_habilite1 = addslashes($_POST['description_habilite1']);
$habilite2 = addslashes($_POST['habilite2']);
$description_habilite2 = addslashes($_POST['description_habilite2']);
$ultimate = addslashes($_POST['ultimate']);
$description_ultimate = addslashes($_POST['description_ultimate']);
$description_longue = addslashes($_POST['description_longue']);
$iconOrigine = $_POST['icon-origine'];
$giOrigine = $_POST['gi-origine'];

if (empty($icon)) {
    $icon = $iconOrigine;
}

if (empty($gi)) {
    $gi = $giOrigine;
}

$SQL_MODIFIER_HEROS = "UPDATE `heros` SET `nom`='$nom',`classe`='$classe',`pv`='$pv',`description_courte`='$description_courte',`habilite1`='$habilite1',`description_habilite1`='$description_habilite1',`habilite2`='$habilite2',`description_habilite2`='$description_habilite2',`ultimate`='$ultimate',`description_ultimate`='$description_ultimate',`description_longue`='$description_longue', `icon` = '$icon', `gi` = '$gi' WHERE id_heros=" . $idHeros;

$requeteModifierHeros = $basededonnees->prepare($SQL_MODIFIER_HEROS);
$reussiteModifierHeros = $requeteModifierHeros->execute();

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