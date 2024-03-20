<?php
include "basededonnees.php";

$resultats = [];
if (!empty($_GET['mot'])) {

    $mot = $_GET['mot'];
    $SQL_RECHERCHE_RAPIDE = "SELECT * FROM `heros` WHERE nom LIKE '%$mot%' OR  classe LIKE '%$mot%' OR pv LIKE '%$mot%' OR description_courte LIKE '%$mot%' LIKE '%$mot%' ";

    $requeteRechercheRapide = $basededonnees->prepare($SQL_RECHERCHE_RAPIDE);
    $requeteRechercheRapide->execute();
    $resultats = $requeteRechercheRapide->fetchAll();
}

$titre = "Recherche ";
require 'header.php';

?>


        <h1>Overwatch</h1>

        <?php
if (count($resultats) != 0) {
    ?>

        <h2><?="Le mot : " . $mot . " a été trouvé " . count($resultats) . " fois."?></h2>
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
            <div class="images"><img src="images/mini/<?=$resultats['icon']?>" alt="illustration"></div>
            <h3 class="nom"><?=$resultats['nom']?></h3>
            <br>
            <span class="classe"><?=$resultats['classe']?></span>
            <span class="pv"><?=$resultats['pv']?></span>
            <br>
            <br><p class="description_courte"><?=$resultats['description_courte']?></p>
        </div>
        </div>




            <?php

}

?>

<?php
require 'footer.php';
?>
