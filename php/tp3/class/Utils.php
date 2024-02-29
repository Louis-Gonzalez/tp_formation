<?php 
class Utils
{
    static function connectDB(){
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

    //////////////////////////////////////////////// factorisation /////////////////////////////////////////////////////////////////////
    // factorisation de la fonction qui test le rôle
    static function isRole($role){
        $is_role = isset($_SESSION['user']['roles']) || !in_array('ROLE_ADMIN', json_decode($_SESSION['user']['roles']));
        return $is_role;
    }
    
    // factorisation de la fonction debuf var_Utils::dump
    static function dump($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
    
    // factorisation de la fonction de nettoyage des champs inputs des formulaires
    static function cleaner($input){
        $stringclean = htmlentities(strip_tags($input));
        return $stringclean;
    }




}

?>  