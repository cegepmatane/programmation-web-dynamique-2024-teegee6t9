<?php
include "../basededonnees.php";

$MESSAGE_SQL_LISTE_HEROS = "SELECT `id_heros`, `nom`, `icon` FROM `heros`";

$requeteListeHeros = $basededonnees->prepare($MESSAGE_SQL_LISTE_HEROS);
$requeteListeHeros->execute();
$listeHeros = $requeteListeHeros->fetchAll();

$titre = "Panneau d'administration";
require 'header.php';
?>


    <div class="container">
        <h1>Panneau d'administration</h1>
        <a href="ajouter-heros.php" class="bouton">Ajouter</a>
        <div id="liste-heros"></div>
        <?php
foreach ($listeHeros as $heros) {
    ?>
    <div class="section">
    <div class="heros">
        <div class="images"><img src="../images/mini/<?=$heros['icon']?>" alt="illustration"></div>
        <h3 class="nom"><?=$heros['nom']?></h3>
        <a href="modifier-heros.php?heros=<?=$heros['id_heros']?>" class="bouton">Modifier</a>
        <a href="supprimer-heros.php?heros=<?=$heros['id_heros']?>" class="bouton">Supprimer</a>
    </div>
    </div>

            <?php

}
?>
    </div>


<?php
require '../footer.php';
?>
