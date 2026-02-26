<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";
$titre = "Création compte";
require "header.php";

// Traitement de inscription-information.php
if (isset($_POST['inscription-identification'])) {

    if (empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['courriel'])) {
        $_SESSION['erreurIdentification'] = "<h4>Veuillez renseigner tous les champs !</h4>";
        header('Location: inscription-identification.php');
        exit;
    } else if (!filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erreurIdentification'] = "<h4>Veuillez renseigner votre email correctement</h4>";
        header('Location: inscription-identification.php');
        exit;
    } else if (MembreDAO::trouverCourriel(filter_var($_POST['courriel'], FILTER_SANITIZE_EMAIL))) {
        $_SESSION['erreurIdentification'] = "<h4>Courriel non-disponible</h4>";
        header('Location: inscription-identification.php');
        exit;
    } else {
        $filtreMembre = array(
            'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
            'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
            'courriel' => FILTER_SANITIZE_EMAIL,
        );
    
        $_SESSION['membre'] = filter_input_array(INPUT_POST, $filtreMembre);
    }
}
?>

<!-- Formulaire inscription-information.php -->
<section class="container">
    <h2>Inscritpion d'un membre - Informations</h2>

    <form action="traitement-inscription.php" method="post" class="form" enctype="multipart/form-data">
        <div id="erreur">
            <?php if (!empty($_SESSION['erreurInformation'])) {
                echo $_SESSION['erreurInformation'];
                unset($_SESSION['erreurInformation']);
            } ?>
        </div>
        <div id="entree-pseudonyme">
            <label for="pseudonyme">Pseudonyme</label>
            <input type="text" name="pseudonyme" id="pseudonyme">
        </div>
        <div id="entree-avatar">
            <label for="avatar">Avatar</label>
            <input type="file" name="image" id="avatar">
        </div>
        <div id="entree-motdepasse">
            <label for="motdepasse">Mot de passe</label>
            <input type="password" name="motdepasse" id="motdepasse">
        </div>
        <div id="entree-motdepasse2">
            <label for="motdepasse2">Confirmation du mot de passe</label>
            <input type="password" name="motdepasse2" id="motdepasse2">
        </div>

        <div id="entree-rank">
            <label for="rank">Rank</label>
            <select name="rank" id="rank">
                <option value="" selected disabled>Rank</option>
                <option value="bronze">Bronze</option>
                <option value="argent">Argent</option>
                <option value="or">Or</option>
                <option value="platine">Platine</option>
                <option value="diamant">Diamant</option>
                <option value="maitre">Maitre</option>
                <option value="grand-maitre">Grand Maitre</option>
                <option value="top500">top500</option>
            </select>
        </div>
        <div id="entree-main">
            <label for="main">Main</label>
            <input type="text" name="main" id="main">
        </div>

        <input type="submit" name="imageok" value="Enregistrer">
    </form>
</section>

<?php
require "../footer.php";
?>