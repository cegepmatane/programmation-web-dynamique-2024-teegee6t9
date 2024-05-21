<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$titre = "Membre";
require "header.php";
?>

<section class="conteneur">
    <h2>Membre</h2>

    <?php
    // Inclure la page si le membre n'est pas connecté
    if (empty($_SESSION['membre']['pseudonyme'])) {
        include_once "membre/formulaire-membre-authentification.php";

        echo '<div>
        <a href="membre/inscription-identification.php"class="bouton">Créer un compte</a>
        </div>';
        // Si le membre est connecté -> ouvrir la page vue-membre-detail
    } else {
        $membre = MembreDAO::trouverMembre($_SESSION['membre']);
        include_once "membre/vue-membre-detail.php";
    }

    ?>
</section>
<?php
require "footer.php";
?>