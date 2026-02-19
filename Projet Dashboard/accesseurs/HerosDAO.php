<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class HerosDAO
{
    public static function listerHeros()
    {
        // Lire tous les documents de la collection "heros"
        $response = BaseDeDonnees::firestoreRequest("GET", "heros");
        $documents = json_decode($response, true)["documents"] ?? [];

        $listeHeros = [];
        foreach ($documents as $doc) {
            $fields = $doc["fields"];
            $listeHeros[] = [
                "id_heros"            => basename($doc["name"]),
                "nom"                 => $fields["nom"]["stringValue"] ?? "",
                "classe"              => $fields["classe"]["stringValue"] ?? "",
                "pv"                  => $fields["pv"]["integerValue"] ?? "",
                "description_courte"  => $fields["description_courte"]["stringValue"] ?? "",
                "icon"                => $fields["icon"]["stringValue"] ?? "",
                // Ajoute les autres champs si besoin
            ];
        }

        return $listeHeros;
    }

    public static function lireHeros($idHeros)
    {
        // Lire un document précis dans "heros"
        $response = BaseDeDonnees::firestoreRequest("GET", "heros", null, $idHeros);
        $doc = json_decode($response, true);
        $fields = $doc["fields"] ?? [];

        if (empty($fields)) return null;

        // Reconstruit l'objet comme avant
        return [
            "id_heros"            => $idHeros,
            "nom"                 => $fields["nom"]["stringValue"] ?? "",
            "classe"              => $fields["classe"]["stringValue"] ?? "",
            "pv"                  => $fields["pv"]["integerValue"] ?? "",
            "description_courte"  => $fields["description_courte"]["stringValue"] ?? "",
            "description_longue"  => $fields["description_longue"]["stringValue"] ?? "",
            "icon"                => $fields["icon"]["stringValue"] ?? "",
            "gi"                  => $fields["gi"]["stringValue"] ?? "",
            // Ajoute le reste
        ];
    }

    public static function ajouterHeros($heros)
    {
        // Format Firestore (ajouter document)
        $data = [
            "fields" => [
                "nom"                   => ["stringValue" => $heros['nom']],
                "classe"                => ["stringValue" => $heros['classe']],
                "pv"                    => ["integerValue" => (int)$heros['pv']],
                "description_courte"    => ["stringValue" => $heros['description_courte']],
                "habilite1"             => ["stringValue" => $heros['habilite1']],
                "description_habilite1" => ["stringValue" => $heros['description_habilite1']],
                "habilite2"             => ["stringValue" => $heros['habilite2']],
                "description_habilite2" => ["stringValue" => $heros['description_habilite2']],
                "ultimate"              => ["stringValue" => $heros['ultimate']],
                "description_ultimate"  => ["stringValue" => $heros['description_ultimate']],
                "description_longue"    => ["stringValue" => $heros['description_longue']],
                "icon"                  => ["stringValue" => $heros['icon']],
                "gi"                    => ["stringValue" => $heros['gi']],
            ]
        ];
        $response = BaseDeDonnees::firestoreRequest("POST", "heros", $data);
        return json_decode($response, true); // retourne le document Firestore créé
    }

    public static function modifierHeros($heros, $icon, $gi)
    {
        // PATCH sur le document Firestore (update)
        $data = [
            "fields" => [
                "nom"                   => ["stringValue" => $heros['nom']],
                "classe"                => ["stringValue" => $heros['classe']],
                "pv"                    => ["integerValue" => (int)$heros['pv']],
                "description_courte"    => ["stringValue" => $heros['description_courte']],
                "habilite1"             => ["stringValue" => $heros['habilite1']],
                "description_habilite1" => ["stringValue" => $heros['description_habilite1']],
                "habilite2"             => ["stringValue" => $heros['habilite2']],
                "description_habilite2" => ["stringValue" => $heros['description_habilite2']],
                "ultimate"              => ["stringValue" => $heros['ultimate']],
                "description_ultimate"  => ["stringValue" => $heros['description_ultimate']],
                "description_longue"    => ["stringValue" => $heros['description_longue']],
                "icon"                  => ["stringValue" => $icon],
                "gi"                    => ["stringValue" => $gi],
            ]
        ];

        $response = BaseDeDonnees::firestoreRequest("PATCH", "heros", $data, $heros["id_heros"]);
        return json_decode($response, true);
    }

    public static function supprimerHeros($idheros)
    {
        // DELETE le document Firestore
        $response = BaseDeDonnees::firestoreRequest("DELETE", "heros", null, $idheros);
        // Firestore retourne un body vide en général
        return $response === null || $response === "";
    }

    public static function listerClasse()
    {
        // Regroupement par classe, calculs "à la main" côté PHP
        $response = BaseDeDonnees::firestoreRequest("GET", "heros");
        $documents = json_decode($response, true)["documents"] ?? [];

        $stats = [];
        foreach ($documents as $doc) {
            $fields = $doc["fields"];
            $classe = $fields["classe"]["stringValue"] ?? "inconnu";
            $pv     = (int)($fields["pv"]["integerValue"] ?? 0);

            if (!isset($stats[$classe])) {
                $stats[$classe] = [
                    "classe"    => $classe,
                    "nombre"    => 0,
                    "pv_total"  => 0,
                    "pv_list"   => [],
                ];
            }
            $stats[$classe]["nombre"]++;
            $stats[$classe]["pv_total"] += $pv;
            $stats[$classe]["pv_list"][] = $pv;
        }

        // Calculs finaux
        $result = [];
        foreach ($stats as $classe => $data) {
            $pv_list = $data["pv_list"];
            $pv_moyenne = count($pv_list) ? array_sum($pv_list)/count($pv_list) : 0;
            $pv_max = count($pv_list) ? max($pv_list) : 0;
            $pv_min = count($pv_list) ? min($pv_list) : 0;
            $result[] = [
                "classe"     => $classe,
                "nombre"     => $data["nombre"],
                "pv_moyenne" => round($pv_moyenne, 2),
                "pv_maximal" => $pv_max,
                "pv_minimal" => $pv_min,
            ];
        }
        return $result;
    }

    public static function moyenneEtEcartType()
    {
        // Moyenne et écart-type sur pv, côté PHP
        $response = BaseDeDonnees::firestoreRequest("GET", "heros");
        $documents = json_decode($response, true)["documents"] ?? [];
        $pv_list = [];
        foreach ($documents as $doc) {
            $fields = $doc["fields"];
            $pv = (int)($fields["pv"]["integerValue"] ?? 0);
            $pv_list[] = $pv;
        }
        $count = count($pv_list);
        $moyenne = $count ? array_sum($pv_list)/$count : 0;
        $ecart_type = 0;
        if ($count > 1) {
            $ecart_type = sqrt(array_sum(array_map(function($x) use ($moyenne) { return pow($x-$moyenne, 2); }, $pv_list))/$count);
        }
        return [["moyenne" => round($moyenne,2), "ecart_type" => round($ecart_type,2)]];
    }

    public static function afficherImageAleatoire()
    {
        $response = BaseDeDonnees::firestoreRequest("GET", "heros");
        $documents = json_decode($response, true)["documents"] ?? [];
        if (!$documents) return null;
        // Prend un doc au hasard
        $doc = $documents[array_rand($documents)];
        $fields = $doc["fields"];
        return [
            "nom"  => $fields["nom"]["stringValue"] ?? "",
            "icon" => $fields["icon"]["stringValue"] ?? "",
        ];
    }
}