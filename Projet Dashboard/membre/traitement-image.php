<?php
if (isset($_POST['imageok'])) {
    $dossierCibleAvatar = "../images/membres/";
    $avatar = $_FILES['image']['name'];
    $fichierCibleAvatar = $dossierCibleAvatar . basename($avatar);

    if (preg_match("#png|jpg|jpeg#", $_FILES['image']['type'])) {

        if ($_FILES['image']['size'] > 5000000) {
            echo "<h3>L'avatar est trop volumineux</h3>";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], $fichierCibleAvatar);
            echo "<h3>Avatar envoyé</h3>";
        }
    } else {
        echo "<h3>Le format de l'avatar n'est pas valide</h3>";
    }
}
