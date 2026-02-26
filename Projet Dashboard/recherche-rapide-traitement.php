<?php
require_once __DIR__ . "/accesseurs/BaseDeDonnees.php";

$resultats = [];
$mot = "";
if (!empty($_GET['mot'])) {
    $mot = filter_var($_GET['mot'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Récupère tous les héros depuis Firestore
    $response = BaseDeDonnees::firestoreRequest("GET", "heros");
    $documents = json_decode($response, true)["documents"] ?? [];

    foreach ($documents as $doc) {
        $fields = $doc["fields"];

        // Recherche sur plusieurs champs avec stripos
        if (
            stripos($fields["nom"]["stringValue"] ?? '', $mot) !== false ||
            stripos($fields["classe"]["stringValue"] ?? '', $mot) !== false ||
            stripos($fields["pv"]["stringValue"] ?? '', $mot) !== false ||
            stripos($fields["description_courte"]["stringValue"] ?? '', $mot) !== false
        ) {
            $resultats[] = [
                "nom"                => $fields["nom"]["stringValue"] ?? "",
                "classe"             => $fields["classe"]["stringValue"] ?? "",
                "pv"                 => $fields["pv"]["stringValue"] ?? "",
                "description_courte" => $fields["description_courte"]["stringValue"] ?? "",
                "icon"               => $fields["icon"]["stringValue"] ?? "",
            ];
        }
    }
}

$titre = "Recherche ";
require 'header.php';
?>

<h1>Overwatch</h1>

<?php
if (count($resultats) != 0) {
?>

    <h2><?= "Le mot : " . $mot . " a été trouvé " . count($resultats) . " fois." ?></h2>
<?php
} else {
?>
    <h2>Résultat trouvé : Aucun</h2>
<?php
}
?>

<div id="liste-heros"></div>
<?php
foreach ($resultats as $heros) {
?>
    <div class="container">
        <div class="heros">
            <div class="images"><img src="images/mini/<?= $heros['icon'] ?>" alt="illustration"></div>
            <h3 class="nom"><?= $heros['nom'] ?></h3>
            <br>
            <span class="classe"><?= $heros['classe'] ?></span>
            <span class="pv"><?= $heros['pv'] ?></span>
            <br>
            <br>
            <p class="description_courte"><?= $heros['description_courte'] ?></p>
        </div>
    </div>
<?php
}
?>

<?php
require 'footer.php';
?>