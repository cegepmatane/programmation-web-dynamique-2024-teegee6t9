<?php
require_once __DIR__ . "/accesseurs/BaseDeDonnees.php";
$resultats = [];
$nomRecherche       = filter_var($_GET['recherche-nom'], FILTER_SANITIZE_SPECIAL_CHARS);
$classeRecherche    = filter_var($_GET['recherche-classe'], FILTER_SANITIZE_SPECIAL_CHARS);
$pvRecherche        = filter_var($_GET['recherche-pv'], FILTER_SANITIZE_SPECIAL_CHARS);
$ultimateRecherche  = filter_var($_GET['recherche-ultimate'], FILTER_SANITIZE_SPECIAL_CHARS);

if (!empty($nomRecherche) || !empty($classeRecherche) || !empty($pvRecherche) || !empty($ultimateRecherche)) {
    // 1. Récupère tous les héros depuis Firestore
    $response = BaseDeDonnees::firestoreRequest("GET", "heros");
    $documents = json_decode($response, true)["documents"] ?? [];

    // 2. Filtre les documents selon les critères (simule le WHERE en PHP)
    foreach ($documents as $doc) {
        $fields = $doc["fields"];
        $matches = true;

        if (!empty($nomRecherche)) {
            $matches = $matches && stripos($fields["nom"]["stringValue"] ?? '', $nomRecherche) !== false;
        }
        if (!empty($classeRecherche)) {
            $matches = $matches && stripos($fields["classe"]["stringValue"] ?? '', $classeRecherche) !== false;
        }
        if (!empty($pvRecherche)) {
            $matches = $matches && stripos($fields["pv"]["stringValue"] ?? '', $pvRecherche) !== false;
        }
        if (!empty($ultimateRecherche)) {
            $matches = $matches && (
                stripos($fields["habilite1"]["stringValue"] ?? '', $ultimateRecherche) !== false
                || stripos($fields["habilite2"]["stringValue"] ?? '', $ultimateRecherche) !== false
                || stripos($fields["ultimate"]["stringValue"] ?? '', $ultimateRecherche) !== false
            );
        }

        if ($matches) {
            // On reconstruit le hero comme avant
            $resultats[] = [
                'nom'                 => $fields['nom']['stringValue'] ?? '',
                'classe'              => $fields['classe']['stringValue'] ?? '',
                'pv'                  => $fields['pv']['stringValue'] ?? '',
                'description_courte'  => $fields['description_courte']['stringValue'] ?? '',
                'icon'                => $fields['icon']['stringValue'] ?? '',
                // Ajoute d'autres champs si besoin pour l'affichage
            ];
        }
    }
}
$titre = "Recherche avancée";
require "header.php";
?>

<link rel="stylesheet" href="style/liste-heros.css" />

<h1>Overwatch</h1>
<?php
if (count($resultats) != 0) {
?>
    <h2><?= "Nombre de résultat : " . count($resultats) ?></h2>
<?php
} else {
?>
    <h2>Résultat trouvé : Aucun</h2>
<?php
}
?>

<div id="liste-heros"></div>
<?php
foreach ($resultats as $resultat) {
?>
    <div class="container">
        <div class="heros">
            <div class="images"><img src="images/mini/<?= $resultat['icon'] ?>" alt="illustration"></div>
            <h3 class="nom"><?= $resultat['nom'] ?></h3>
            <span class="classe"><?= $resultat['classe'] ?></span>
            <span class="pv"><?= $resultat['pv'] ?></span>
            <p class="description_courte"><?= $resultat['description_courte'] ?></p>
        </div>
    </div>
<?php
}
?>

<?php
require 'footer.php';
?>