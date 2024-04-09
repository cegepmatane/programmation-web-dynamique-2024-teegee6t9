<?php
if (isset($_POST['imageok'])) {
    $dossierCibleIcon = "../images/mini/";
    $dossierCibleGi = "../images/";
    $icon = $_FILES['icon']['name'];
    $gi = $_FILES['gi']['name'];
    $fichierCibleIcon = $dossierCibleIcon . basename($icon);
    $fichierCibleGi = $dossierCibleGi . basename($gi);

    if (preg_match("#png|jpg|jpeg#", $_FILES['icon']['type'])) {

        if ($_FILES['icon']['size'] > 5000000) {
            echo "<h3>L'icone est trop volumineuse</h3>";

        } elseif (file_exists($fichierCibleIcon)) {
            echo "<h3>L'icone existe déja</h3>";

        } else {
            move_uploaded_file($_FILES['icon']['tmp_name'], $fichierCibleIcon);
            echo "<h3>Icone envoyée</h3>";
        }
    } else {
        echo "<h3>Le format de l'icone n'est pas valide</h3>";
    }

    if (preg_match("#png|jpg|jpeg#", $_FILES['gi']['type'])) {

        if ($_FILES['gi']['size'] > 5000000) {
            ?>
            <br>
            <?php
echo "<h3>La grande illustration est trop volumineuse</h3>";

        } elseif (file_exists($fichierCibleGi)) {
            ?>
            <br>
            <?php
echo "<h3>La grande illustration existe déja</h3>";

        } else {
            move_uploaded_file($_FILES['gi']['tmp_name'], $fichierCibleGi);
            ?>
            <br>
            <?php
echo "<h3>Grande illustration envoyée</h3>";
        }
    } else {
        ?>
        <br>
        <?php
echo "<h3>Le format de l'image n'est pas valide</h3>";
    }

}
