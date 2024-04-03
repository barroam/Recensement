<?php

//inclusion de la classe habitant 
require_once "Habitant.php";

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Recensement');

try {
    // Connexion à la base de données en utilisant PDO
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
 

} catch(PDOException $e) {
    // Affichage d'un message d'erreur et arrêt du script si la connexion échoue
    die("ERREUR: Impossible de se connecter. " . $e->getMessage());
}