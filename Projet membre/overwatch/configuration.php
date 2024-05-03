<?php
session_start();
$adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";
$estSurServeurTiweb = strpos($adresseCourante, 'tiweb.timmatane.ca') !== false ? true : false;

if ($estSurServeurTiweb) {
    define("CHEMIN_ACCESSEUR", $_SERVER['DOCUMENT_ROOT'] . "/etudiants/2023/thibaultg/overwatch/accesseurs/");
} else {
    define("CHEMIN_ACCESSEUR", $_SERVER['DOCUMENT_ROOT'] . "/php/overwatch-securite/accesseurs/");
}
