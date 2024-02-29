<?php
//////////////////////////////////////////////// config.php ////////////////////////////////////////////////////////////////////
// fonction de connexion à la base donnés

const DB_HOST = "localhost"; 
const DB_NAME = "mvc_php";
const DB_USER = "root";
const DB_PASS = "";

// Nouvelle méthode pour déclarer les constantes
const CONFIG_SITE_TITLE = "My wonderfull MVC";

// Ancienne méthode pour déclarer les constantes
define("CONFIG_SITE_SLOGAN", "Cette magnifique structure permet de séparer les responsabilités afin de mieux maintenir notre code");

require("./class/Utils.php");

?>
