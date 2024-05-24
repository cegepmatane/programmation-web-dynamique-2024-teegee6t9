<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$listeHeros = HerosDAO::listerHeros();

$titre = 'Liste Héros';
require 'header.php';

?>



<h2>Liste des Héros</h2>
<div id="liste-heros"></div>


<?php

foreach ($listeHeros as $heros) {
?>
    <div class="container">
        <div class="section">
            <div class="heros">
                <div class="images"><img src="images/mini/<?= $heros['icon'] ?>" alt="illustration"></div>
                <h3 class="nom"><?= $heros['nom'] ?></h3>
                <br>
                <span class="classe"><?= $heros['classe'] ?></span>
                <span class="pv"><?= $heros['pv'] ?></span>
                <br>
                <br>
                <p class="description_courte"><?= $heros['description_courte'] ?></p>
                <a href="heros.php?heros=<?= $heros['id_heros'] ?>" class="bouton">En savoir plus</a>
            </div>
        </div>
    </div>


<?php
}
?>
<?php
require 'footer.php';
?>