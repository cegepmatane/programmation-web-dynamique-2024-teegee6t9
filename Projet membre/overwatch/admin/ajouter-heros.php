<?php
$titre = "Panneau d'administration";
require 'header.php';

?>
<h1>Panneau d'administration</h1>

<section id="contenu">
    <h2>Ajouteur un héros</h2>
    <form action="traitement-ajouter-heros.php" method="post" enctype="multipart/form-data">
        <div class="champs">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="champs">
            <label for="classe">Classe</label>
            <input type="text" name="classe" id="classe">
        </div>
        <div class="champs">
            <label for="pv">PV</label>
            <input type="text" name="pv" id="pv">
        </div>
        <div class="champs">
            <label for="description_courte">Description Courte</label>
            <textarea name="description_courte" id="description_courte" cols="30" rows="10"></textarea>
        </div>
        <div class="champs">
            <label for="habilite1">Habilité 1</label>
            <input type="text" name="habilite1" id="habilite1">
        </div>
        <div class="champs">
            <label for="description_habilite1">Description Habilité 1</label>
            <textarea name="description_habilite1" id="description_habilite1" cols="30" rows="10"></textarea>
        </div>
        <div class="champs">
            <label for="habilite2">Habilité 2</label>
            <input type="text" name="habilite2" id="habilite2">
        </div>
        <div class="champs">
            <label for="description_habilite2">Description Habilité 2</label>
            <textarea name="description_habilite2" id="description_habilite2" cols="30" rows="10"></textarea>
        </div>
        <div class="champs">
            <label for="ultimate">Ultimate</label>
            <input type="text" name="ultimate" id="ultimate">
        </div>
        <div class="champs">
            <label for="description_ultimate">Description Ultimate</label>
            <textarea name="description_ultimate" id="description_ultimate" cols="30" rows="10"></textarea>
        </div>
        <div class="champs">
            <label for="description_longue">Description Longue</label>
            <textarea name="description_longue" id="description_longue" cols="30" rows="10"></textarea>
        </div>
        <div>
        <label for="icon">Icone</label>
        <input type="file" name="icon"  id="icon" required/>
    </div>
    <div>
        <label for="gi">Grande Illustration</label>
        <input type="file" name="gi"  id="gi" required/>
    </div>

    <input type="submit" name="imageok" value="Enregistrer">
    </form>
</section>
<?php
require "../footer.php";
?>
