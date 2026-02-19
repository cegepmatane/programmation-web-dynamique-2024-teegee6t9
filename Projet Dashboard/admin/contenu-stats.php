<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$statsClasse = HerosDAO::listerClasse();
$statsMyeEt = HerosDAO::moyenneEtEcartType();

$titre = 'Panneau admin';
require 'header.php';
?>

<h2>Statistiques de Contenu</h2>

<div class="stats">
    <div class="liste-items">
        <table>
            <caption>Tableau Statistiques de héros par classe</caption>
            <tr>
                <th>Classe</th>
                <th>Nombre</th>
                <th>PV maximal</th>
                <th>PV minimal</th>
                <th>PV moyen</th>
            </tr>
            <?php
            foreach ($statsClasse as $classe) {
            ?>
                <tr>
                    <td><?= $classe['classe'] ?></td>
                    <td><?= $classe['nombre'] ?></td>
                    <td><?= $classe['pv_maximal'] ?></td>
                    <td><?= $classe['pv_minimal'] ?></td>
                    <td><?= round($classe['pv_moyenne']) ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="liste-items">
        <table>
            <caption>Tableau Statistiques de moyenne et d'écart type</caption>
            <tr>
                <th>Moyenne</th>
                <th>Écarte type</th>

            </tr>
            <?php
            foreach ($statsMyeEt as $moyenneEtEcartType) {
            ?>
                <tr>
                    <td><?= $moyenneEtEcartType['moyenne'] ?></td>
                    <td><?= $moyenneEtEcartType['ecart_type'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<!-- Graphique tarte -->
<div class="stats">
    <div class="chart-container">
        <canvas id="pieChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="anneauChart"></canvas>
    </div>
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
<script src="../js/script-contenu.js"></script>
<a href=" index.php" class="bouton">Retourner au panneau</a>
<?php
require "../footer.php";
