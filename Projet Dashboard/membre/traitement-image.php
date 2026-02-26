<?php
$avatar = ""; // valeur par défaut
if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
    $dossierCibleAvatar = "../images/membres/";
    $avatar = basename($_FILES['image']['name']);
    $fichierCibleAvatar = $dossierCibleAvatar . $avatar;

    if (preg_match("#png|jpg|jpeg#", $_FILES['image']['type'])) {
        if ($_FILES['image']['size'] <= 5000000) {
            move_uploaded_file($_FILES['image']['tmp_name'], $fichierCibleAvatar);
            // plus d'echo ici !
        } else {
            $avatar = ""; // trop gros
        }
    } else {
        $avatar = ""; // format invalide
    }
}

return $avatar;