<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";

$statsClasse = HerosDAO::listerClasse();
$imageAleatoire = HerosDAO::afficherImageAleatoire();
$statsJour = ClicDAO::listerStatsParJour();
$statsLangue = ClicDAO::listerStatsParLangue();

$jourDeLaSemaine = array("Dimanche", "Lundi", "Mardi", "Mecredi", "Jeudi", "Vendredi", "Samedi");

$titre = 'Acceuil';
require 'header.php';
?>

<h2>Acceuil</h2>

<div class="contenu-index">

    <!-- DASHBOARD -->
    <h2 class="dashboard">Dashboard</h2>
    <section id="dashboard">
        <div class="vignette">
            <article class="photos">
                <h3 class="nom-aleatoire"><?= $imageAleatoire['nom'] ?></h3>
                <img src="../images/mini/<?= $imageAleatoire['icon'] ?>" class="" alt="image-aleatoire">
            </article>
        </div>
        <div class="vignette">
            <article class="photos">
                <canvas id="pieChart"></canvas>
                <a href="contenu-stats.php" class="bouton">Statistiques héros</a>
            </article>
        </div>
        <div class="vignette">
            <article class="photos-liste">
                <h3>Gestion des heros</h3>
                <a href="ajouter-heros.php" class="bouton">Ajouter Héros</a>
                <a href="liste-admin.php" class="bouton">Modifier Héros</a>
                <a href="liste-admin.php" class="bouton">Supprimer Héros</a>
            </article>
        </div>
        <div class="vignette">
            <article class="photos">
                <canvas id="lineChart2"></canvas>
                <a href="visite-stats.php" class="bouton">Statistiques visites</a>
            </article>
        </div>

        <div class="vignette">
            <article class="photos">
                <canvas id="anneauChart"></canvas>
                <a href="contenu-stats.php" class="bouton">Statistiques héros</a>
            </article>
        </div>


        <div class="vignette">
            <article class="photos">
                <canvas id="lineChart1"></canvas>
                <a href="visite-stats.php" class="bouton">Statistiques visites</a>
            </article>
        </div>
    </section>

</div>
<script>
    <?php
    $listeParClasse = [];
    foreach ($statsClasse as $classe) {
        $nombreParClasse[] = $classe['nombre'];
        $pvMoyParClasse[] = $classe['pv_moyenne'];
        $pvMaxParClasse[] = $classe['pv_maximal'];
        $pvMinParClasse[] = $classe['pv_minimal'];
        $listeParClasse[] = $classe['classe'];
    }

    ?>
    let labelPie = <?= json_encode($listeParClasse)  ?>;
    let dataPieNombre = <?= json_encode($nombreParClasse)  ?>;
    let dataPiePvMoy = <?= json_encode($pvMoyParClasse)  ?>;
    let dataPiePvMax = <?= json_encode($pvMaxParClasse)  ?>;
    let dataPiePvMin = <?= json_encode($pvMinParClasse)  ?>;
</script>
<script>
    <?php
    $listeDeJour = [];
    foreach ($statsJour as $jour) {
        $nombreJour[] = $jour['visites'];
        $listeJour[] = $jourDeLaSemaine[$jour['jour'] - 1];
    }
    ?>

    let labelLine = <?= json_encode($listeJour); ?>;
    let dataLine = <?= json_encode($nombreJour); ?>;

    console.log(labelLine);
    <?php
    $listeDeLangue = [];
    foreach ($statsLangue as $langue) {
        $nombreLangue[] = $langue['visites'];
        $listeLangue[] = $langue['langue'];
    }

    ?>

    let labelBar = <?= json_encode($listeLangue) ?>;
    let dataBar = <?= json_encode($nombreLangue) ?>;
</script>
<script src="../js/script-contenu.js"></script>
<script src="../js/script-visites.js"></script>
<?php
require '../footer.php';
?>