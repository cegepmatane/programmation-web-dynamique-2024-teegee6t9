<?php
require "../configuration.php";
$titre = "Création compte";
require "header.php";
?>

<section class="container">
    <h2>Inscritpion d'un membre - Identification</h2>

    <form action="inscription-information.php" method="post" class="form">

        <div id="erreur">
            <?php if (!empty($_SESSION['erreurIdentification'])) {
                echo $_SESSION['erreurIdentification'];
                unset($_SESSION['erreurIdentification']);
            } ?>
        </div>
        <div id="entree-prenom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div id="entree-nom">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div id="entree-courriel">
            <label for="courriel">Courriel</label>
            <input type="text" name="courriel" id="courriel">
        </div>

        <input type="submit" name="inscription-identification" value="Suivant">
    </form>
</section>

<?php
require "../footer.php";
?>