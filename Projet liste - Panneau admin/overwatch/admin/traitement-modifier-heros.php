<?php
include "../basededonnees.php";
$titre = "Panneau d'administration";
require 'header.php';

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

$SQL_MODIFIER_HEROS = "UPDATE `heros` SET `nom`='$nom',`classe`='$classe',`pv`='$pv',`description_courte`='$description_courte',`habilite1`='$habilite1',`description_habilite1`='$description_habilite1',`habilite2`='$habilite2',`description_habilite2`='$description_habilite2',`ultimate`='$ultimate',`description_ultimate`='$description_ultimate',`description_longue`='$description_longue' WHERE id_heros=" . $idHeros;

$requeteModifierFilm = $basededonnes->prepare($SQL_MODIFIER_HEROS);
$reussiteModifierFilm = $requeteModifierFilm->execute();

if ($reussiteModifierFilm) {
    ?>
    <div class="container">
    Votre film a été modifier à la base de données
    </div>
    <?php
} else {
    echo "Votre modification de fichier a échoué";
}

require "../footer.php";