<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$idHeros = filter_var($_GET['heros'], FILTER_SANITIZE_NUMBER_INT);
$heros = HerosDAO::lireHeros($idHeros);

$titre = $heros['nom'];
require 'header.php';

?>



<h1>Héros</h1>
<section id="contenu">
    <h2 class="nom"><a href="liste-heros.php?heros=<?= $heros['id_heros'] ?>"><?= $heros['nom'] ?></a></h2>
    <br>
    <div class="illustration"><img src="images/<?= $heros['gi'] ?>" alt="illustration"></div>
    <div class="heros">
        <h3>Caractéristiques :</h3>
        <span class="classe"><?= $heros['classe'] ?></span>
        <br><span class="pv"><?= $heros['pv'] ?></span>
        <br>
        <br>
        <h4 class="habilite1"><?= $heros['habilite1'] ?></h4>
        <br>
        <p class="description_habilite1"><?= $heros['description_habilite1'] ?></p>
        <br><br>
        <h4 class="habilite2"><?= $heros['habilite2'] ?></h4>
        <br>
        <p class="description_habilite2"><?= $heros['description_habilite2'] ?></p>
        <br><br>
        <h4 class="ultimate"><?= $heros['ultimate'] ?></h4>
        <br>
        <p class="description_ultimate"><?= $heros['description_ultimate'] ?></p>
        <br>
        <h3>Histoire :</h3>
        <pre class="description_longue"><?= $heros['description_longue'] ?></pre>
    </div>
</section>

<?php
require 'footer.php'
?>