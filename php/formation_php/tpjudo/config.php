<?php
// fonction de connexion à la base donnés
function connectDB(){
    $db = false;
    try {
        // connexion à la base donnée mvc_php réutilisation des constantes dans la demande connexion
        $db = new PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME,DB_USER,DB_PASS); // le port par défaut est 3306 soit port=3306 ou on ne le note pas 
    } catch (PDOException $e) {
        $error = $e;
        // tenter de réessayer la connexion après un certain délai, par exemple
        echo "Hum problème de connexion au serveur de base de données";
    }
    return $db;
}
const DB_HOST = "localhost"; 
const DB_NAME = "data_tpjudo_php";
const DB_USER = "root";
const DB_PASS = "";

// Nouvelle méthode pour déclarer les constantes
const CONFIG_SITE_TITLE = "Mon superbe MVC";

// Ancienne méthode pour déclarer les constantes
define("CONFIG_SITE_SLOGAN", "Cette magnifique structure permet de séparer les responsabilités afin de mieux maintenir notre code");

?>
