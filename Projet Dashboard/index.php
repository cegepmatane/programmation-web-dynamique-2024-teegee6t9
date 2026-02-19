<?php
require_once __DIR__ . '/configuration.php';
require_once CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);
$titre = 'Accueil';
require_once __DIR__ . '/header.php';
?>

<h2>Acceuil</h2>

<?php
require_once __DIR__ . '/footer.php';
?>