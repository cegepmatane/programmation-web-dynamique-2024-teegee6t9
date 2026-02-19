<?php
$resultats = [];
$nomRecherche = filter_var($_GET['recherche-nom'], FILTER_SANITIZE_SPECIAL_CHARS);
$classeRecherche = filter_var($_GET['recherche-classe'], FILTER_SANITIZE_SPECIAL_CHARS);
$pvRecherche = filter_var($_GET['recherche-pv'], FILTER_SANITIZE_SPECIAL_CHARS);
$ultimateRecherche = filter_var($_GET['recherche-ultimate'], FILTER_SANITIZE_SPECIAL_CHARS);

if (!empty($nomRecherche) || !empty($classeRecherche) || !empty($pvRecherche) || !empty($ultimateRecherche)) {
    $SQL_RECHERCHE_AVANCEE = "SELECT * FROM heros WHERE 1 = 1 ";

    if (!empty($nomRecherche)) {
        $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND LOWER(nom) LIKE LOWER('%$nomRecherche%')";
    }
    if (!empty($classeRecherche)) {
        $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND LOWER(classe) LIKE LOWER('%$classeRecherche%')";
    }
    if (!empty($pvRecherche)) {
        $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND LOWER(pv) LIKE LOWER('%$pvRecherche%')";
    }
    if (!empty($ultimateRecherche)) {
        $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . "AND LOWER(habilite1) LIKE LOWER('%$ultimateRecherche%') OR LOWER(habilite2) LIKE LOWER('%$ultimateRecherche%') OR LOWER(ultimate) LIKE LOWER('%$ultimateRecherche%')";
    }

    include "basededonnees.php";

    $requeteRecherche = $basededonnees->prepare($SQL_RECHERCHE_AVANCEE);
    $requeteRecherche->execute();
    $resultats = $requeteRecherche->fetchAll();
}
$titre = "Recherche avancée";
require "header.php";
?>

<link rel="stylesheet" href="style/liste-heros.css" />


<h1>Overwatch</h1>
<?php
if (count($resultats) != 0) {
?>

    <h2><?= "Nombre de réslutat : " . count($resultats) ?></h2>
<?php
} else {
?>
    <h2>Résultat trouvé : Aucun</h2>
<?php
}
?>

<div id="liste-heros"></div>
<?php
foreach ($resultats as $resultats) {
?>
    <div class="container">
        <div class="heros">
            <div class="images"><img src="images/mini/<?= $resultats['icon'] ?>" alt="illustration"></div>
            <h3 class="nom"><?= $resultats['nom'] ?></h3>
            <span class="classe"><?= $resultats['classe'] ?></span>
            <span class="pv"><?= $resultats['pv'] ?></span>
            <p class="description_courte"><?= $resultats['description_courte'] ?></p>
        </div>
    </div>

<?php

}
?>

<?php
require 'footer.php';
?>