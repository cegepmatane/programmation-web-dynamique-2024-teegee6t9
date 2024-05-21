<?php
require_once "configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);
$titre = 'Acceuil';
require 'header.php';
?>

<h2>Acceuil</h2>

<?php
require 'footer.php';
?>