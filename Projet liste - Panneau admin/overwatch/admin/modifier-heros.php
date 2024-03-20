<?php
include "../basededonnees.php";
$titre = "Panneau d'administration";
require 'header.php';

$noHeros = $_GET['heros'];

$SQL_HEROS = "SELECT * from heros WHERE id_heros =" . $noHeros;
$requeteFilm = $basededonnees->prepare($SQL_HEROS);
$requeteFilm->execute();
$heros = $requeteFilm->fetch();

?>
<h1>Panneau d'administration</h1>

<section id="contenu">
    <h2>Modifier un héros</h2>
    <form action="traitement-modifier-heros.php" method="post">
    <div class="champs">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?=$heros['nom']?>">
    </div>
    <div class="champs">
        <label for="classe">Classe</label>
        <input type="text" name="classe" id="classe" value="<?=$heros['classe']?>">
    </div>
    <div class="champs">
        <label for="pv">PV</label>
        <input type="text" name="pv" id="pv" value="<?=$heros['pv']?>">
    </div>
    <div class="champs">
        <label for="description_courte">Description Courte</label>
        <textarea name="description_courte" id="description_courte" cols="30" rows="10"><?=$heros['description_courte']?></textarea>
    </div>
    <div class="champs">
        <label for="habilite1">Habilité 1</label>
        <input type="text" name="habilite1" id="habilite1" value="<?=$heros['habilite1']?>">
    </div>
    <div class="champs">
        <label for="description_habilite1">Description Habilité 1</label>
        <textarea name="description_habilite1" id="description_habilite1" cols="30" rows="10"><?=$heros['description_habilite1']?></textarea>
    </div>
    <div class="champs">
        <label for="habilite2">Habilité 2</label>
        <input type="text" name="habilite2" id="habilite2" value="<?=$heros['habilite2']?>">
    </div>
    <div class="champs">
        <label for="description_habilite2">Description Habilité 2</label>
        <textarea name="description_habilite2" id="description_habilite2" cols="30" rows="10"><?=$heros['description_habilite2']?></textarea>
    </div>
    <div class="champs">
        <label for="ultimate">Ultimate</label>
        <input type="text" name="ultimate" id="ultimate" value="<?=$heros['ultimate']?>">
    </div>
    <div class="champs">
        <label for="description_ultimate">Description Ultimate</label>
        <textarea name="description_ultimate" id="description_ultimate" cols="30" rows="10"><?=$heros['description_ultimate']?></textarea>
    </div>
    <div class="champs">
        <label for="description_longue">Description Longue</label>
        <textarea name="description_longue" id="description_longue" cols="30" rows="10"><?=$heros['description_longue']?></textarea>
    </div>
    <div>
        <input type="submit" value="Enregistrer">
        <input type="hidden" name="id_heros" value="<?=$heros['id_heros']?>">
    </div>
    </form>
