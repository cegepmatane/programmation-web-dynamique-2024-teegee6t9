<?php
require_once __DIR__ . '/configuration.php';
require_once CHEMIN_ACCESSEUR . "ClicDAO.php";
require_once CHEMIN_ACCESSEUR . "HerosDAO.php";

ClicDAO::enregistrerVisite($_SERVER);
$listeHeros = HerosDAO::listerHeros(); // récupère tous les héros

$titre = 'Accueil';
require_once __DIR__ . '/header.php';
?>

<main>
    <!-- Section d'accueil / intro -->
    <section class="intro">
        <h2>Bienvenue sur Overwatch Heroes</h2>
        <p>
            Découvrez tous les héros d'Overwatch, leurs compétences, leur classe et plus encore.
            Parcourez les cartes, apprenez à connaître chaque personnage et préparez-vous pour vos prochaines parties !
        </p>
    </section>

    <!-- Section héros populaires (limité à 3) -->
    <section class="liste-heros">
        <h2 class="section-title">Nos Héros</h2>
        <div class="liste-heros-container">
            <?php
            $compteur = 0;
            foreach($listeHeros as $heros):
                if($compteur >= 3) break; // max 3 héros
                $compteur++;
            ?>
                <div class="heros">
                    <img src="images/mini/<?= $heros['icon'] ?>" alt="<?= $heros['nom'] ?>">
                    <h3 class="nom"><?= $heros['nom'] ?></h3>
                    <span class="classe"><?= $heros['classe'] ?></span>
                    <p class="description_courte"><?= $heros['description_courte'] ?></p>
                    <a href="heros.php?heros=<?= $heros['id_heros'] ?>" class="bouton">En savoir plus</a>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="liste-heros.php" class="voir-tous">Voir tous les héros</a>
    </section>

    <!-- Section CTA -->
    <section class="cta">
        <h2>Rejoignez-nous !</h2>
        <p>
            Créez votre compte, personnalisez votre profil et commencez à suivre vos héros préférés.
        </p>
        <a href="membre/inscription-identification.php" class="bouton">Créer un compte</a>
    </section>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>