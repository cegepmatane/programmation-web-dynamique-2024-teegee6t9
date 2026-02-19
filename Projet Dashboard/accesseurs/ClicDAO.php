<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class ClicDAO
{
    public static function enregistrerVisite($donnees)
    {
        // Prépare les données pour Firestore (format requis)
        $data = [
            "fields" => [
                "ip"         => ["stringValue" => $donnees["REMOTE_ADDR"]],
                "page"       => ["stringValue" => $donnees["PHP_SELF"]],
                "parametres" => ["stringValue" => $donnees["QUERY_STRING"]],
                "langue"     => ["stringValue" => $donnees["HTTP_ACCEPT_LANGUAGE"]],
                "moment"     => ["timestampValue" => date("c")], // format Firestore RFC 3339
                "reference"  => ["stringValue" => $donnees["HTTP_REFERER"]],
            ]
        ];
        // Enregistre la visite dans la collection "clic"
        $response = BaseDeDonnees::firestoreRequest("POST", "clic", $data);
        return json_decode($response, true); // retourne le résultat Firestore
    }

    public static function listerStatsParJour()
    {
        // Récupération des visites (GET sur collection "clic")
        $response = BaseDeDonnees::firestoreRequest("GET", "clic");
        $documents = json_decode($response, true)["documents"] ?? [];

        // Regrouper par jour avec PHP (puisque REST Firestore ne permet pas d'agréger côté serveur)
        $stats = [];
        foreach ($documents as $doc) {
            // Convertit le timestamp Firestore en jour
            $moment = $doc["fields"]["moment"]["timestampValue"];
            $jour = date("N", strtotime($moment)); // 1=Lundi ... 7=Dimanche

            $ip = $doc["fields"]["ip"]["stringValue"] ?? '';
            if (!isset($stats[$jour])) $stats[$jour] = ["jour" => $jour, "clics" => 0, "ips" => []];
            $stats[$jour]["clics"]++;
            $stats[$jour]["ips"][$ip] = true; // pour compter visites uniques
        }

        // Transformation finale
        $result = [];
        foreach ($stats as $s) {
            $result[] = [
                "jour"    => $s["jour"],
                "clics"   => $s["clics"],
                "visites" => count($s["ips"]),
            ];
        }
        return $result;
    }

    public static function listerStatsParLangue()
    {
        $response = BaseDeDonnees::firestoreRequest("GET", "clic");
        $documents = json_decode($response, true)["documents"] ?? [];

        $stats = [];
        foreach ($documents as $doc) {
            $langue = $doc["fields"]["langue"]["stringValue"] ?? 'inconnue';
            $ip     = $doc["fields"]["ip"]["stringValue"] ?? '';
            if (!isset($stats[$langue])) $stats[$langue] = ["langue" => $langue, "clics" => 0, "ips" => []];
            $stats[$langue]["clics"]++;
            $stats[$langue]["ips"][$ip] = true;
        }
        $result = [];
        foreach ($stats as $s) {
            $result[] = [
                "langue"  => $s["langue"],
                "clics"   => $s["clics"],
                "visites" => count($s["ips"]),
            ];
        }
        return $result;
    }
}