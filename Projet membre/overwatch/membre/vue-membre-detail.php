<div id="container">
    <div class="heros">
        <div class="image">
            <img src="images/membres/<?= $membre['avatar'] ?>" class="images" alt="illustration">
        </div>

        <div class="membre">
            <h3>Pseudonyme :</h3>
            <p><?= $membre['pseudonyme'] ?></p>
        </div>

        <div class="membre">
            <h3>Courriel :</h3>
            <p><?= $membre['courriel'] ?></p>
        </div>

        <div class="membre">
            <h3>Prénom :</h3>
            <p><?= $membre['prenom'] ?></p>
        </div>

        <div class="membre">
            <h3>Nom :</h3>
            <p><?= $membre['nom'] ?></p>
        </div>
        <div class="image">
            <h3>Rank :</h3>
            <img src="images/rank/<?= $membre['rank'] ?>.jpg" class="images" alt="illustration">
        </div>
        <div class="image">
            <h3>Main :</h3>
            <img src="images/mini/icon-<?= $membre['main'] ?>.jpg" class="images" alt="illustration">
            <p><?= $membre['main'] ?></p>
        </div>
    </div>
</div>
<a href="membre/deconnexion.php" class="bouton">Se déconnecter</a>