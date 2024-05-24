<?php
$titre = "Recherche avancée";
require 'header.php';
?>

<h2>Recherche avancée</h2>

<section id="contenu">
    <div id="container">
        <form action="recherche-avancee-traitement.php" method="get">
            <div>
                <label for ="recherche-nom">Nom</label>
                <input type="text" name="recherche-nom" id="recherche-nom">
            </div>
            <br>
            <div>
                <label for ="recherche-classe">Classe</label>
                <input type="text" name="recherche-classe" id="recherche-classe">
            </div>
            <br>
            <div>
                <label for ="recherche-pv">PV</label>
                <input type="text" name="recherche-pv" id="recherche-pv">
            </div>
            <br>
            <div>
                <label for ="recherche-ultimate">Ultimate</label>
                <input type="text" name="recherche-ultimate" id="recherche-ultimate">
            </div>
            <br>
            <div>
                <input type="submit" value="Recherche">
            </div>
        </form>
    </div>
</section>

<?php
require 'footer.php'?>