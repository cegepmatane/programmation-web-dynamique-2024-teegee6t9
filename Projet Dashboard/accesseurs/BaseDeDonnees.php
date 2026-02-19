<?php

class BaseDeDonnees
{
    private static $projectId = 'web-dynamique-44c73'; // adapte ton ID
    private static $apiKey    = 'AIzaSyB78wyJavNeru8o3KGMwJkriZ0AWNgmHLs'; // mets ton API Key ici

    // requête REST vers Firestore, méthode utilitaire générique
    public static function firestoreRequest($method, $collection, $data = null, $documentId = null)
    {
        $baseUrl = "https://firestore.googleapis.com/v1/projects/" . self::$projectId . "/databases/(default)/documents/";
        $url = $baseUrl . $collection;
        if ($documentId) $url .= "/$documentId";
        $url .= "?key=" . self::$apiKey;

        $opts = [
            "http" => [
                "method" => $method,
                "header" => "Content-Type: application/json\r\n",
            ]
        ];
        if ($data !== null) {
            $opts["http"]["content"] = json_encode($data);
        }

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
}