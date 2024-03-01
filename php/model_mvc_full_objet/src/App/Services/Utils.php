<?php 

namespace App\Services;

class Utils
{
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