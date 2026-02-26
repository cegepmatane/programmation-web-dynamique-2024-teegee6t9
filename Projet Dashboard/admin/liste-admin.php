<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";

// Firestore : récupère tous les héros
$listeHeros = HerosDAO::listerHeros();

$titre = "Panneau d'administration";
require 'header.php';
?>

<div class="container">
    <h1>Panneau d'administration</h1>
    <a href="index.php" class="bouton">Retourner au panneau</a>
    <div id="liste-heros"></div>
    <?php
    foreach ($listeHeros as $heros) {
    ?>
        <div class="section">
            <div class="heros">
                <div class="images"><img src="../images/mini/<?= $heros['icon'] ?>" alt="illustration"></div>
                <h3 class="nom"><?= $heros['nom'] ?></h3>
                <a href="modifier-heros.php?heros=<?= $heros['id_heros'] ?>" class="bouton">Modifier</a>
                <a href="supprimer-heros.php?heros=<?= $heros['id_heros'] ?>" class="bouton">Supprimer</a>
            </div>
        </div>

    <?php
    }
    ?>
</div>

<?php
require '../footer.php';
?>