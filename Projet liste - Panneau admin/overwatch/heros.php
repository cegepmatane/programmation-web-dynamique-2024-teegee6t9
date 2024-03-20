<?php
$idHeros = $_GET['heros'];
$MESSAGE_SQL_HEROS = "SELECT * FROM `heros` WHERE `id_heros`=" . $idHeros;

include "basededonnees.php";
$requeteListeHeros = $basededonnees->prepare($MESSAGE_SQL_HEROS);
$requeteListeHeros->execute();
$heros = $requeteListeHeros->fetch();

$titre = $heros['nom'];
require 'header.php';

?>



<h1>Héros</h1>
<section id="contenu">
    <div class="heros">
        <h2 class="nom"><a href="liste-heros.php?heros=<?=$heros['id_heros']?>"><?=$heros['nom']?></a></h2>
        <br>
        <div class="illustration"><img src="images/<?=$heros['grande_illustration']?>" alt="illustration"></div>
        <h3>Caractéristiques :</h3>
        <span class="classe"><?=$heros['classe']?></span>
        <br><span class="pv"><?=$heros['pv']?></span>
        <br>
        <br><h4 class="habilite1"><?=$heros['habilite1']?></h4>
        <br>
        <p class="description_habilite1"><?=$heros['description_habilite1']?></p>
        <br><br>
        <h4 class="habilite2"><?=$heros['habilite2']?></h4>
        <br>
        <p class="description_habilite2"><?=$heros['description_habilite2']?></p>
        <br><br>
        <h4 class="ultimate"><?=$heros['ultimate']?></h4>
        <br>
        <p class="description_ultimate"><?=$heros['description_ultimate']?></p>
        <br>
        <h3>Histoire :</h3>
        <pre class="description_longue"><?=$heros['description_longue']?></pre>
    </div>
</section>

<?php
require 'footer.php'
?>