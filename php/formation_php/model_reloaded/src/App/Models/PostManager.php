<?php

// On déclare l'espace de nom
namespace App\Models;

// On indique les classes dont on a besoin
use App\Models\Post;

// On indique la base de données
use App\Services\DataBase;

// On déclare la class PostManager
class PostManager extends AbstractManager
{
    public function __construct(){

        // On indique la base de données
        self::$db = new DataBase();
        // On indique le nom de la table
        self::$tableName = 'post';
        // On indique les classes dont on a besoin
        self::$obj = new Post();
    }
}


?>