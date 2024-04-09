<?php
include "../basededonnees.php";
$titre = "Panneau d'administration";
require 'header.php';

$noHeros = $_GET['heros'];

$SQL_HEROS = "SELECT * from heros WHERE id_heros =" . $noHeros;
$requeteHeros = $basededonnees->prepare($SQL_HEROS);
$requeteHeros->execute();
$heros = $requeteHeros->fetch();
?>
<div class="section">
    <div class="heros">
        <h2>Etes vous sur de vouloir supprimer le héros suivant : <?=$heros['nom']?> ?</h2>
        <form action="traitement-supprimer-heros.php" method="post">
            <input type="submit" class="bouton" value="Oui, supprimer">
            <input type="hidden" name="id_heros" value="<?=$heros['id_heros']?>">
        </form>
        <a href="index.php" class="bouton">Non, revenir à la page précédente</a>
    </div>
</div>

<?php
require '../footer.php';
?>