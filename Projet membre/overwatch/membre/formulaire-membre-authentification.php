<!-- formulaire de connexion membre -->
<form action="membre/traitement-authentification.php" method="post" class="form">
    <div id="erreur">
        <?php if (!empty($_SESSION['erreur'])) {
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        } ?>
    </div>
    <div>
        <label for="pseudonyme"></label>
        <input type="text" name="pseudonyme" id="pseudonyme" placeholder="Pseudonyme">
    </div>

    <div>
        <label for="motdepasse"></label>
        <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe">
    </div>

    <input type="submit" name="membre-authentification" value="Me connecter">
</form>