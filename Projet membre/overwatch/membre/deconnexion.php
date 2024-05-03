<?php
require "../configuration.php";


// On ne peut détruire la session que si le membre est connecté
if (isset($_SESSION['membre']['pseudonyme'])) {
    // On détruit les variables de la session (on les vides)
    session_unset();


    // Ensuite on détruit la session
    session_destroy();

    // On retourne à la page d'acceuilù
    header('Location: ../index.php');
} else {
    echo "Vous n'êtes pas connecté !";
}
