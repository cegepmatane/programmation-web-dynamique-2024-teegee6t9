<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class HerosDAO
{
    /* =====================================================
       LISTER TOUS LES HEROS
    ====================================================== */
    public static function listerHeros()
    {
        $response = BaseDeDonnees::firestoreRequest("GET", "heros");
        $documents = json_decode($response, true)["documents"] ?? [];

        $listeHeros = [];

        foreach ($documents as $doc) {
            $fields = $doc["fields"] ?? [];

            $listeHeros[] = self::mapperDocument($doc["name"], $fields);
        }

        return $listeHeros;
    }

    /* =====================================================
       LIRE UN SEUL HEROS
    ====================================================== */
    public static function lireHeros($id)
    {
        $response = BaseDeDonnees::firestoreRequest("GET", "heros", null, $id);
        $data = json_decode($response, true);

        if (!isset($data["fields"])) {
            return null;
        }

        return self::mapperDocument($data["name"], $data["fields"]);
    }

    /* =====================================================
       AJOUTER UN HEROS
    ====================================================== */
    public static function ajouterHeros($heros)
    {
        $data = [
            "fields" => self::formatterPourFirestore($heros)
        ];

        $response = BaseDeDonnees::firestoreRequest("POST", "heros", $data);

        return json_decode($response, true);
    }

    /* =====================================================
       MODIFIER UN HEROS
    ====================================================== */
    public static function modifierHeros($id, $heros)
    {
        $data = [
            "fields" => self::formatterPourFirestore($heros)
        ];

        $response = BaseDeDonnees::firestoreRequest("PATCH", "heros", $data, $id);

        return json_decode($response, true);
    }

    /* =====================================================
       SUPPRIMER UN HEROS
    ====================================================== */
    public static function supprimerHeros($id)
    {
        BaseDeDonnees::firestoreRequest("DELETE", "heros", null, $id);
        return true;
    }

    /* =====================================================
       STATISTIQUES PAR CLASSE
    ====================================================== */
    public static function listerClasse()
    {
        $heros = self::listerHeros();

        $stats = [];

        foreach ($heros as $h) {
            $classe = $h["classe"] ?: "inconnu";

            preg_match('/\d+/', $h["pv"], $matches);
            $pv = isset($matches[0]) ? (int)$matches[0] : 0;

            if (!isset($stats[$classe])) {
                $stats[$classe] = [
                    "classe" => $classe,
                    "nombre" => 0,
                    "pv_total" => 0,
                    "pv_list" => []
                ];
            }

            $stats[$classe]["nombre"]++;
            $stats[$classe]["pv_total"] += $pv;
            $stats[$classe]["pv_list"][] = $pv;
        }

        $result = [];

        foreach ($stats as $classe => $data) {
            $pv_list = $data["pv_list"];

            $pv_moyenne = count($pv_list) ? array_sum($pv_list) / count($pv_list) : 0;
            $pv_max = count($pv_list) ? max($pv_list) : 0;
            $pv_min = count($pv_list) ? min($pv_list) : 0;

            $result[] = [
                "classe" => $classe,
                "nombre" => $data["nombre"],
                "pv_moyenne" => round($pv_moyenne, 2),
                "pv_maximal" => $pv_max,
                "pv_minimal" => $pv_min
            ];
        }

        return $result;
    }

    /* =====================================================
       MOYENNE ET ECART TYPE DES PV
    ====================================================== */
    public static function moyenneEtEcartType()
    {
        $heros = self::listerHeros();

        $pv_list = array_map(function ($h) {
            preg_match('/\d+/', $h["pv"], $matches);
            return isset($matches[0]) ? (int)$matches[0] : 0;
        }, $heros);

        $count = count($pv_list);

        if ($count === 0) {
            return [["moyenne" => 0, "ecart_type" => 0]];
        }

        $moyenne = array_sum($pv_list) / $count;

        $variance = 0;
        foreach ($pv_list as $pv) {
            $variance += pow($pv - $moyenne, 2);
        }

        $variance = $variance / $count;
        $ecart_type = sqrt($variance);

        return [[
            "moyenne" => round($moyenne, 2),
            "ecart_type" => round($ecart_type, 2)
        ]];
    }

    /* =====================================================
       IMAGE ALEATOIRE
    ====================================================== */
    public static function afficherImageAleatoire()
    {
        $heros = self::listerHeros();

        if (empty($heros)) {
            return null;
        }

        $random = $heros[array_rand($heros)];

        return [
            "nom" => $random["nom"],
            "icon" => $random["icon"]
        ];
    }

    /* =====================================================
       FONCTIONS PRIVEES
    ====================================================== */

    private static function mapperDocument($name, $fields)
    {
        return [
            "id_heros" => basename($name), // ID Firestore stable
            "nom" => $fields["nom"]["stringValue"] ?? "",
            "classe" => $fields["classe"]["stringValue"] ?? "",
            "pv" => $fields["pv"]["stringValue"] ?? "",
            "description_courte" => $fields["description_courte"]["stringValue"] ?? "",
            "description_longue" => $fields["description_longue"]["stringValue"] ?? "",
            "habilite1" => $fields["habilite1"]["stringValue"] ?? "",
            "description_habilite1" => $fields["description_habilite1"]["stringValue"] ?? "",
            "habilite2" => $fields["habilite2"]["stringValue"] ?? "",
            "description_habilite2" => $fields["description_habilite2"]["stringValue"] ?? "",
            "ultimate" => $fields["ultimate"]["stringValue"] ?? "",
            "description_ultimate" => $fields["description_ultimate"]["stringValue"] ?? "",
            "icon" => $fields["icon"]["stringValue"] ?? "",
            "gi" => $fields["gi"]["stringValue"] ?? "",
        ];
    }

    private static function formatterPourFirestore($heros)
    {
        return [
            "nom" => ["stringValue" => $heros['nom'] ?? ""],
            "classe" => ["stringValue" => $heros['classe'] ?? ""],
            "pv" => ["stringValue" => $heros['pv'] ?? ""],
            "description_courte" => ["stringValue" => $heros['description_courte'] ?? ""],
            "description_longue" => ["stringValue" => $heros['description_longue'] ?? ""],
            "habilite1" => ["stringValue" => $heros['habilite1'] ?? ""],
            "description_habilite1" => ["stringValue" => $heros['description_habilite1'] ?? ""],
            "habilite2" => ["stringValue" => $heros['habilite2'] ?? ""],
            "description_habilite2" => ["stringValue" => $heros['description_habilite2'] ?? ""],
            "ultimate" => ["stringValue" => $heros['ultimate'] ?? ""],
            "description_ultimate" => ["stringValue" => $heros['description_ultimate'] ?? ""],
            "icon" => ["stringValue" => $heros['icon'] ?? ""],
            "gi" => ["stringValue" => $heros['gi'] ?? ""],
        ];
    }
}