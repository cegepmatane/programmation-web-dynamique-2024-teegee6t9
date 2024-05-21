 <?php
    require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

    class ClicDAO
    {
        public static function enregistrerVisite($donnees)
        {
            $MESSAGE_ENREGISTRER_VISITE = "INSERT INTO clic (ip, page, parametres, langue, moment, reference) VALUES (:ip, :page, :parametres, :langue, NOW(), :reference)";
            $requeteVisite = BaseDeDonnees::getConnexion()->prepare($MESSAGE_ENREGISTRER_VISITE);
            $requeteVisite->bindParam(':ip', $donnees["REMOTE_ADDR"], PDO::PARAM_STR);
            $requeteVisite->bindParam(':page', $donnees["PHP_SELF"], PDO::PARAM_STR);
            $requeteVisite->bindParam(':parametres', $donnees["QUERY_STRING"], PDO::PARAM_STR);
            $requeteVisite->bindParam(':langue', $donnees["HTTP_ACCEPT_LANGUAGE"], PDO::PARAM_STR);
            $requeteVisite->bindParam(':reference', $donnees["HTTP_REFERER"], PDO::PARAM_STR);
            $requeteVisite->execute();

            return $requeteVisite;
        }

        public static function listerStatsParJour()
        {
            $MESSAGE_STATS_PAR_JOUR = "SELECT DAYOFWEEK(moment) as jour, COUNT(id_clic) as clics, COUNt(DISTINCT ip) as visites FROM clic GROUP BY jour";
            $requeteStasts = BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_PAR_JOUR);
            $requeteStasts->execute();
            $statsJour = $requeteStasts->fetchAll();

            return $statsJour;
        }

        public static function listerStatsParLangue()
        {
            $MESSAGE_STATS_PAR_LANGUE = "SELECT langue as langue, COUNT(id_clic) as clics, COUNt(DISTINCT ip) as visites FROM clic GROUP BY langue";
            $requeteStasts = BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_PAR_LANGUE);
            $requeteStasts->execute();
            $statsLangue = $requeteStasts->fetchAll();

            return $statsLangue;
        }
    }
