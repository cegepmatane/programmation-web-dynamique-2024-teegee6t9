<?php
include "../basededonnees.php";
$titre = "Panneau d'administration";
require 'header.php';

$idHeros = $_POST['id_heros'];

$SQL_SUPPRIMER_HEROS = "DELETE FROM `heros` WHERE id_heros=" . $idHeros;
$requeteSupprimerHeros = $basededonnees->prepare($SQL_SUPPRIMER_HEROS);
$reussiteSupprimerHeros = $requeteSupprimerHeros->execute();

if ($reussiteSupprimerHeros) {
    ?>
    <div class="container">
        <h3>Votre Héros a bien été supprimer de la base de données</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <h3>Votre suppression de fichier a échoué</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
    <?php

}

require "../footer.php";