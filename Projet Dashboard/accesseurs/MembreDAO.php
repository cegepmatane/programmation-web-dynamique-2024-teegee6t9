<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class MembreDAO
{
    public static function trouverMembre($membre)
    {
        // Recherche par pseudonyme : Firestore ne permet pas "WHERE", donc on doit filtrer en PHP.
        $response = BaseDeDonnees::firestoreRequest("GET", "membre");
        $documents = json_decode($response, true)["documents"] ?? [];

        foreach ($documents as $doc) {
            $fields = $doc["fields"];
            if (isset($fields["pseudonyme"]["stringValue"]) && $fields["pseudonyme"]["stringValue"] === $membre['pseudonyme']) {
                // Reconstruit le membre au format attendu
                return [
                    "id_membre"    => basename($doc["name"]),
                    "prenom"       => $fields["prenom"]["stringValue"]      ?? "",
                    "nom"          => $fields["nom"]["stringValue"]         ?? "",
                    "pseudonyme"   => $fields["pseudonyme"]["stringValue"]   ?? "",
                    "courriel"     => $fields["courriel"]["stringValue"]     ?? "",
                    "motdepasse"   => $fields["motdepasse"]["stringValue"]   ?? "",
                    "avatar"       => $fields["avatar"]["stringValue"]       ?? "",
                    "rank"         => $fields["rank"]["stringValue"]         ?? "",
                    "main"         => $fields["main"]["stringValue"]         ?? "",
                ];
            }
        }
        return null;
    }

    public static function enregistrerMembre($membre)
    {
        // Ajoute un document membre dans Firestore
        $data = [
            "fields" => [
                "prenom"     => ["stringValue" => $membre['prenom']],
                "nom"        => ["stringValue" => $membre['nom']],
                "pseudonyme" => ["stringValue" => $membre['pseudonyme']],
                "courriel"   => ["stringValue" => $membre['courriel']],
                "motdepasse" => ["stringValue" => $membre['motdepasse']],
                "avatar"     => ["stringValue" => $membre['avatar']],
                "rank"       => ["stringValue" => $membre['rank']],
                "main"       => ["stringValue" => $membre['main']]
            ]
        ];
        $response = BaseDeDonnees::firestoreRequest("POST", "membre", $data);
        return json_decode($response, true); // retourne le membre crée
    }

    public static function trouverCourriel($courriel)
    {
        // Recherche par courriel, filtrage PHP
        $response = BaseDeDonnees::firestoreRequest("GET", "membre");
        $documents = json_decode($response, true)["documents"] ?? [];

        foreach ($documents as $doc) {
            $fields = $doc["fields"];
            if (isset($fields["courriel"]["stringValue"]) && $fields["courriel"]["stringValue"] === $courriel) {
                return [
                    "id_membre" => basename($doc["name"])
                ];
            }
        }
        return null;
    }
}