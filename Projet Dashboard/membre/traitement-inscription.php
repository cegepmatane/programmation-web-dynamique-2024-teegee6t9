<?php
require "../configuration.php";
include "traitement-image.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

// Traitement inscription-information.php
if (isset($_POST['imageok'])) {

    if (empty($_POST['pseudonyme']) || !preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/', $_POST['pseudonyme'])) {
        $_SESSION['erreurInformation'] = "<h4>Veuillez renseigner votre pseudonyme correctement</h4>";
        header('Location: inscription-information.php');
    } else if (!empty((MembreDAO::trouverMembre(array('pseudonyme' => $_POST['pseudonyme']))))) {
        $_SESSION['erreurInformation'] = "<h4>Pseudonyme non-disponible</h4>";
        header('Location: inscription-information.php');
    } else if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreurInformation'] = "<h4>Vos mots de passe doivent être identiques</h4>";
        header('Location: inscription-information.php');
    } else if (empty($_POST['motdepasse']) || !preg_match('/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{8,})\S$/', $_POST['motdepasse'])) {
        $_SESSION['erreurInformation'] = "<h4>Vos mots de passe doivent être identiques</h4>";
        header('Location: inscription-information.php');
    } else if (empty($avatar)) {
        $_SESSION['erreurInformation'] = "<h4>Veuillez choisir votre avatar</h4>";
        header('Location: inscription-information.php');
    } else if ($_POST['rank'] == "") {
        $_SESSION['erreurInformation'] = "<h4>Veuillez selectionner votre rank</h4>";
        header('Location: inscription-information.php');
    } else if ($_POST['main'] == "") {
        $_SESSION['erreurInformation'] = "<h4>Veuillez selectionner votre main</h4>";
        header('Location: inscription-information.php');
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
