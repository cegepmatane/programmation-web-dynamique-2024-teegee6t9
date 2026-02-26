<?php
require "../configuration.php";
include "traitement-image.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

// Traitement inscription-information.php
if (isset($_POST['imageok'])) {

    $avatar = include "traitement-image.php";

    if (empty($_POST['pseudonyme']) || !preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $_POST['pseudonyme'])) {
        $_SESSION['erreurInformation'] = "<h4>Veuillez renseigner votre pseudonyme correctement</h4>";
        header('Location: inscription-information.php');
        exit;
    } else if (!empty((MembreDAO::trouverMembre(array('pseudonyme' => $_POST['pseudonyme']))))) {
        $_SESSION['erreurInformation'] = "<h4>Pseudonyme non-disponible</h4>";
        header('Location: inscription-information.php');
        exit;
    } else if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreurInformation'] = "<h4>Vos mots de passe doivent être identiques</h4>";
        header('Location: inscription-information.php');
        exit;
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $_POST['motdepasse'])) {
        $_SESSION['erreurInformation'] = "<h4>Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule et un chiffre</h4>";
        header('Location: inscription-information.php');
        exit;
    } else if (empty($avatar)) {
        $_SESSION['erreurInformation'] = "<h4>Veuillez choisir votre avatar</h4>";
        header('Location: inscription-information.php');
        exit;
    } else if ($_POST['rank'] == "") {
        $_SESSION['erreurInformation'] = "<h4>Veuillez selectionner votre rank</h4>";
        header('Location: inscription-information.php');
        exit;
    } else if ($_POST['main'] == "") {
        $_SESSION['erreurInformation'] = "<h4>Veuillez selectionner votre main</h4>";
        header('Location: inscription-information.php');
        exit;
    } else {
        $filtreMembre = array(
            'pseudonyme' => FILTER_SANITIZE_SPECIAL_CHARS,
            'motdepasse' => FILTER_SANITIZE_ENCODED,
            'rank' => FILTER_SANITIZE_SPECIAL_CHARS,
            'main' => FILTER_SANITIZE_SPECIAL_CHARS,
        );

        $informations = filter_input_array(INPUT_POST,  $filtreMembre);

        $_SESSION['membre']['pseudonyme'] = $informations['pseudonyme'];
        $_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
        $_SESSION['membre']['avatar'] = $avatar;
        $_SESSION['membre']['rank'] = $informations['rank'];
        $_SESSION['membre']['main'] = $informations['main'];

        $reussiteAjouterMembre = MembreDAO::enregistrerMembre($_SESSION['membre']);

        if ($reussiteAjouterMembre) {
            header('Location: ../membre.php');
        }
    }
}
