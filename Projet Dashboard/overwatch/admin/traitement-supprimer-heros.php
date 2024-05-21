<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$titre = "Panneau d'administration";
require 'header.php';

$idHeros = $_POST['id_heros'];
$reussiteSupprimerHeros = HerosDAO::supprimerHeros($idHeros);


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
