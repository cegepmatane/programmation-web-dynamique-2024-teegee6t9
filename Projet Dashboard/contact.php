<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);

session_start(); // pour accéder à $_SESSION
$titre = "Contact";
require 'header.php';
?>

<div class="container">
    <h2>Contactez-nous</h2>

    <?php if (!empty($_SESSION['membre'])): ?>
        <p>Bonjour <?= htmlspecialchars($_SESSION['membre']['pseudonyme']) ?>, vous pouvez nous laisser un message :</p>
    <?php else: ?>
        <p>Vous pouvez nous laisser un message :</p>
    <?php endif; ?>

    <form method="post" action="f-contact.php" id="formulaireContact">
        <div class="form-group">
            <label for="mailContact">Adresse mail :</label>
            <input type="email" name="mailContact" id="mailContact" 
                   value="<?= !empty($_SESSION['membre']['courriel']) ? htmlspecialchars($_SESSION['membre']['courriel']) : '' ?>" 
                   placeholder="votre@mail.com" required>
            <span id="erreurMailContact" class="erreur"></span>
        </div>

        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea name="exp" id="commentaire" rows="10" cols="30" placeholder="Votre commentaire..." required></textarea>
        </div>

        <input type="submit" value="Envoyer" class="bouton">
    </form>
</div>

<?php
require 'footer.php';
?>