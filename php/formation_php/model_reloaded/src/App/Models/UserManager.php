<?php

// on déclare l'espace de nom
namespace App\Models;

// On appelle les class nécessaires
use App\Models\User;


// On indique la BDD
use App\Services\Database;

// on déclare la class UserManager
class UserManager extends AbstractManager
{
    
    public function __construct(){
        
        // On indique la base de données
        self::$db = new DataBase();
        // On indique le nom de la table
        self::$tableName = 'user';
        // On indique les classes dont on a besoin
        self::$obj = new User();
    }

    public function getUserByEmail($email=null) :array|false
    {
        // SELECT * FROM user WHERE email = ?
        // On n'est pas tout à fait l'objet car on devrait utiliser self:: .... 
        //("SELECT user.*, contact.firstname ,contact.lastname FROM user, contact WHERE email=? AND user.id = contact.user_id  LIMIT 1" )
        $where = !is_null($email) ? " WHERE email = ?" : "";
        $row =[];
        // le paramètre  en [] remplace le ?
        // $row = self::$db->select("SELECT * FROM ".self::$tableName." ".$where."LIMIT 1", [$email]); // le paramètre  en [] remplace le ?
        $row = self::$db->select("SELECT user.*, contact.firstname ,contact.lastname FROM user, contact ".$where." AND user.id = contact.user_id  LIMIT 1", [$email]);
        return $row;
    }

}
?>