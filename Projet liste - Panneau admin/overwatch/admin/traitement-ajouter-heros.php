<?php
include "../basededonnees.php";

$titre = "Panneau d'administration";
require 'header.php';
require 'traitement-image.php';

// print_r($_POST);
$nom = $_POST['nom'];
$classe = $_POST['classe'];
$pv = $_POST['pv'];
$description_courte = $_POST['description_courte'];
$habilite1 = $_POST['habilite1'];
$description_habilite1 = $_POST['description_habilite1'];
$habilite2 = $_POST['habilite2'];
$description_habilite2 = $_POST['description_habilite2'];
$ultimate = $_POST['ultimate'];
$description_ultimate = $_POST['description_ultimate'];
$description_longue = $_POST['description_longue'];

$SQL_AJOUTER_HEROS = "INSERT INTO `heros`(`nom`, `classe`, `pv`, `description_courte`, `habilite1`, `description_habilite1`, `habilite2`, `description_habilite2`, `ultimate`, `description_ultimate`, `description_longue`, `icon`, `gi`) VALUES ('" . $nom . "','" . $classe . "','" . $pv . "','" . $description_courte . "','" . $habilite1 . "','" . $description_habilite1 . "','" . $habilite2 . "','" . $description_habilite2 . "','" . $ultimate . "','" . $description_ultimate . "','" . $description_longue . "','" . $icon . "','" . $gi . "')";

$requeteAjouterHeros = $basededonnees->prepare($SQL_AJOUTER_HEROS);
$reussiteAjout = $requeteAjouterHeros->execute();

if ($reussiteAjout) {
    ?>
    <div class="container">
        <h3>Votre héros a été ajouté à la base de données</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <h3>Votre envoi de fichier a échoué</h3>
        <a href="index.php" class="bouton">Retourner au panneau</a>
    </div>
    <?php
}

require "../footer.php";
?>
