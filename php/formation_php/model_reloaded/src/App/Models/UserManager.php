<?php

// on déclare l'espace de nom
namespace App\Models;

use App\Models\User;
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
}


?>