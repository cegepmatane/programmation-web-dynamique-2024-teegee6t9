<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";

$statsJour = ClicDAO::listerStatsParJour();
$statsLangue = ClicDAO::listerStatsParLangue();

$jourDeLaSemaine = array("Dimanche", "Lundi", "Mardi", "Mecredi", "Jeudi", "Vendredi", "Samedi");

$titre = 'Panneau admin';
require 'header.php';
?>
<h2>Statistiques de Visites</h2>

<div class="stats">
    <div class="liste-items">
        <table>
            <caption>Tableau Statistiques par jour de la semaine</caption>
            <tr>
                <th>Jour</th>
                <th>Clics</th>
                <th>Visites</th>
            </tr>
            <?php
            foreach ($statsJour as $jourEnregistrer) {
            ?>
                <tr>
                    <td><?= $jourDeLaSemaine[$jourEnregistrer['jour'] - 1] ?></td>
                    <td><?= $jourEnregistrer['clics'] ?></td>
                    <td><?= $jourEnregistrer['visites'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <!-- Graphique 1 -->
        <div class="chart-container2">
            <canvas id="lineChart1">

            </canvas>
        </div>


    </div>

    <div class="liste-items">
        <!-- Graphique 2 -->
        <div class="chart-container2">
            <canvas id="lineChart2">

            </canvas>
        </div>
        <table>
            <caption>Tableau Statistiques par langue</caption>
            <tr>
                <th>Langue</th>
                <th>Clics</th>
                <th>Visites</th>
            </tr>
            <?php
            foreach ($statsLangue as $langueEnregistrer) {
            ?>
                <tr>
                    <td><?= $langueEnregistrer['langue'] ?></td>
                    <td><?= $langueEnregistrer['clics'] ?></td>
                    <td><?= $langueEnregistrer['visites'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

    </div>
</div>
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
<script src="../js/script-visites.js"></script>
<a href="index.php" class="bouton">Retourner au panneau</a>
<?php
require "../footer.php";
