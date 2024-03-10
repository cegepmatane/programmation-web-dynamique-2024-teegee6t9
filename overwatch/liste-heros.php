<?php
include "basededonnees.php";

$MESSAGE_SQL_LISTE_HEROS = "SELECT `id_heros`, `nom`, `classe`, `pv`, `description_courte`, `icon` FROM `heros`";

$requeteListeHeros = $basededonnees->prepare($MESSAGE_SQL_LISTE_HEROS);
$requeteListeHeros->execute();
$listeHeros = $requeteListeHeros->fetchAll();

$titre = 'Liste Héros';
require 'header.php';
?>

<head>
    <link rel="stylesheet" href="style/liste-heros.css"/>
</head>
    <div class="container">
        <h2>Liste des Héros</h2>
        <div id="liste-heros"></div>
        <?php
foreach ($listeHeros as $heros) {
    ?>
    <div class="section">
        <div class="heros">
            <div class="images"><img src="images/mini/<?=$heros['icon']?>" alt="illustration"></div>
            <h3 class="nom"><?=$heros['nom']?></h3>
            <br>
            <span class="classe"><?=$heros['classe']?></span>
            <span class="pv"><?=$heros['pv']?></span>
            <br>
            <br><p class="description_courte"><?=$heros['description_courte']?></p>
            <a href="heros.php?heros=<?=$heros['id_heros']?>" class="bouton">En savoir plus</a>
        </div>
    </div>

            <?php
}
?>
<?php
require 'footer.php';
?>
