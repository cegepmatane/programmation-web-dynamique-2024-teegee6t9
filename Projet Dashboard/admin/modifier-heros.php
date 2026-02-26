<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "HerosDAO.php";

$titre = "Panneau d'administration";
require 'header.php';

$idFirestore = filter_var($_GET['heros'], FILTER_SANITIZE_SPECIAL_CHARS);

// Récupère le document Firestore du héros (via son id Firestore transmis dans l’URL)
$heros = HerosDAO::lireHeros($idFirestore);

if (!$heros) {
    echo "<h2>Héros introuvable</h2>";
    require '../footer.php';
    exit;
}
?>
<h1>Panneau d'administration</h1>

<section id="contenu">
    <h2>Modifier un héros</h2>
    <form action="traitement-modifier-heros.php" method="post" enctype="multipart/form-data">
        <div class="champs">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($heros['nom']) ?>">
        </div>
        <div class="champs">
            <label for="classe">Classe</label>
            <input type="text" name="classe" id="classe" value="<?= htmlspecialchars($heros['classe']) ?>">
        </div>
        <div class="champs">
            <label for="pv">PV</label>
            <input type="text" name="pv" id="pv" value="<?= htmlspecialchars($heros['pv']) ?>">
        </div>
        <div class="champs">
            <label for="description_courte">Description Courte</label>
            <textarea name="description_courte" id="description_courte" cols="30" rows="10"><?= htmlspecialchars($heros['description_courte']) ?></textarea>
        </div>
        <div class="champs">
            <label for="habilite1">Habilité 1</label>
            <input type="text" name="habilite1" id="habilite1" value="<?= htmlspecialchars($heros['habilite1']) ?>">
        </div>
        <div class="champs">
            <label for="description_habilite1">Description Habilité 1</label>
            <textarea name="description_habilite1" id="description_habilite1" cols="30" rows="10"><?= htmlspecialchars($heros['description_habilite1']) ?></textarea>
        </div>
        <div class="champs">
            <label for="habilite2">Habilité 2</label>
            <input type="text" name="habilite2" id="habilite2" value="<?= htmlspecialchars($heros['habilite2']) ?>">
        </div>
        <div class="champs">
            <label for="description_habilite2">Description Habilité 2</label>
            <textarea name="description_habilite2" id="description_habilite2" cols="30" rows="10"><?= htmlspecialchars($heros['description_habilite2']) ?></textarea>
        </div>
        <div class="champs">
            <label for="ultimate">Ultimate</label>
            <input type="text" name="ultimate" id="ultimate" value="<?= htmlspecialchars($heros['ultimate']) ?>">
        </div>
        <div class="champs">
            <label for="description_ultimate">Description Ultimate</label>
            <textarea name="description_ultimate" id="description_ultimate" cols="30" rows="10"><?= htmlspecialchars($heros['description_ultimate']) ?></textarea>
        </div>
        <div class="champs">
            <label for="description_longue">Description Longue</label>
            <textarea name="description_longue" id="description_longue" cols="30" rows="10"><?= htmlspecialchars($heros['description_longue']) ?></textarea>
        </div>
        <div>
            <label for="icon">Icône</label>
            <input type="file" name="icon" id="icon" />
            <input type="hidden" name="icon_origine" value="<?= htmlspecialchars($heros['icon']) ?>">
        </div>
        <div>
            <label for="gi">Grande Illustration</label>
            <input type="file" name="gi" id="gi" />
            <input type="hidden" name="gi_origine" value="<?= htmlspecialchars($heros['gi']) ?>">
        </div>

        <input type="submit" name="imageok" value="Enregistrer">

        <!-- IMPORTANT : id Firestore pour la modification -->
        <input type="hidden" name="id_heros" value="<?= htmlspecialchars($idFirestore) ?>">

    </form>
</section>
<?php
require '../footer.php';
?>