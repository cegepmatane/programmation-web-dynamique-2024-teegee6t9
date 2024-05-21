<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class HerosDAO
{
    public static function listerHeros()
    {
        $MESSAGE_SQL_LISTE_HEROS = "SELECT `id_heros`, `nom`, `classe`, `pv`, `description_courte`, `icon` FROM `heros`";
        $requeteListeHeros = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_HEROS);
        $requeteListeHeros->execute();
        $listeHeros = $requeteListeHeros->fetchAll();

        return $listeHeros;
    }

    public static function lireHeros($idHeros)
    {

        $MESSAGE_SQL_HEROS = "SELECT * FROM `heros` WHERE id_heros= :idHeros";
        $requeteListeHeros = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_HEROS);
        $requeteListeHeros->bindParam(':idHeros', $idHeros, PDO::PARAM_INT);
        $requeteListeHeros->execute();
        $heros = $requeteListeHeros->fetch();

        return $heros;
    }

    public static function ajouterHeros($heros)
    {
        $SQL_AJOUTER_HEROS = "INSERT INTO `heros`(`nom`, `classe`, `pv`, `description_courte`, `habilite1`, `description_habilite1`, `habilite2`, `description_habilite2`, `ultimate`, `description_ultimate`, `description_longue`, `icon`, `gi`) VALUES (:nom, :classe, :pv, :description_courte, :habilite1, :description_habilite1, :habilite2, :description_habilite2, :ultimate, :description_ultimate, :description_longue, :icon, :gi)";

        $requeteAjouterHeros = BaseDeDonnees::getConnexion()->prepare($SQL_AJOUTER_HEROS);
        $requeteAjouterHeros->bindParam(':nom', $heros['nom'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':classe', $heros['classe'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':pv', $heros['pv'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':description_courte', $heros['description_courte'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':habilite1', $heros['habilite1'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':description_habilite1', $heros['description_habilite1'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':habilite2', $heros['habilite2'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':description_habilite2', $heros['description_habilite2'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':ultimate', $heros['ultimate'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':description_ultimate', $heros['description_ultimate'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':description_longue', $heros['description_longue'], PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':icon', $icon, PDO::PARAM_STR);
        $requeteAjouterHeros->bindParam(':gi', $gi, PDO::PARAM_STR);
        $reussiteAjout = $requeteAjouterHeros->execute();

        return  $reussiteAjout;
    }

    public static function modifierHeros($heros, $icon, $gi)
    {
        $SQL_MODIFIER_HEROS = "UPDATE `heros` SET nom = :nom, classe = :classe , pv = :pv , description_courte = :description_courte , habilite1 = :habilite1 , description_habilite1 = :description_habilite1 , habilite2 = :habilite2 , description_habilite2 = :description_habilite2 , ultimate = :ultimate , description_ultimate = :description_ultimate , description_longue = :description_longue , icon = :icon, gi = :gi WHERE id_heros= :idHeros";

        $requeteModifierHeros = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_HEROS);
        $requeteModifierHeros->bindParam(':idHeros', $heros['id_heros'], PDO::PARAM_INT);
        $requeteModifierHeros->bindParam(':nom', $heros['nom'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':classe', $heros['classe'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':pv', $heros['pv'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':description_courte', $heros['description_courte'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':habilite1', $heros['habilite1'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':description_habilite1', $heros['description_habilite1'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':habilite2', $heros['habilite2'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':description_habilite2', $heros['description_habilite2'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':ultimate', $heros['ultimate'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':description_ultimate', $heros['description_ultimate'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':description_longue', $heros['description_longue'], PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':icon', $icon, PDO::PARAM_STR);
        $requeteModifierHeros->bindParam(':gi', $gi, PDO::PARAM_STR);
        $reussiteModifierHeros = $requeteModifierHeros->execute();

        return $reussiteModifierHeros;
    }

    public static function supprimerHeros($idheros)
    {
        $SQL_SUPPRIMER_HEROS = "DELETE FROM `heros` WHERE id_heros= :idHeros";
        $requeteSupprimerHeros = BaseDeDonnees::getConnexion()->prepare($SQL_SUPPRIMER_HEROS);
        $requeteSupprimerHeros->bindParam(':idHeros', $idheros, PDO::PARAM_INT);
        $reussiteSupprimerHeros = $requeteSupprimerHeros->execute();

        return $reussiteSupprimerHeros;
    }

    public static function listerClasse()
    {
        $MESSAGE_LISTER_CLASSE = "SELECT classe, COUNT(*) as nombre, AVG(pv) as pv_moyenne, MAX(pv) as pv_maximal, MIN(pv) as pv_minimal FROM heros GROUP BY classe";
        $requeteClasse = BaseDeDonnees::getConnexion()->prepare($MESSAGE_LISTER_CLASSE);
        $requeteClasse->execute();
        $statsClasse = $requeteClasse->fetchAll();

        return $statsClasse;
    }

    public static function moyenneEtEcartType()
    {
        $MESSAGE_MOYENNE_ET_ECART_TYPE = "SELECT AVG(pv) AS moyenne, STDDEV(pv) AS ecart_type FROM heros";
        $requeteMyeEt = BaseDeDonnees::getConnexion()->prepare($MESSAGE_MOYENNE_ET_ECART_TYPE);
        $requeteMyeEt->execute();
        $statsMyeEt = $requeteMyeEt->fetchAll();

        return $statsMyeEt;
    }

    public static function afficherImageAleatoire()
    {
        $MESSAGE_IMAGE_ALEATOIRE = "SELECT nom, icon FROM heros ORDER BY RAND() LIMIT 1;";
        $requeteImageAleatoire = BaseDeDonnees::getConnexion()->prepare($MESSAGE_IMAGE_ALEATOIRE);
        $requeteImageAleatoire->execute();
        $imageAleatoire = $requeteImageAleatoire->fetch();

        return $imageAleatoire;
    }
}
