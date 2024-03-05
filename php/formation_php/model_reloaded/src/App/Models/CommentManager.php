<?php

// On déclare l'espace de nom
namespace App\Models;

// On indique les classes dont on a besoin
use App\Models\Comment;

// On indique la base de données
use App\Services\DataBase;

// On déclare la class CommentManager
class CommentManager extends AbstractManager
{
    public function __construct(){

        // On indique la base de données
        self::$db = new DataBase();
        // On indique le nom de la table
        self::$tableName = 'comment';
        // On indique les classes dont on a besoin
        self::$obj = new Comment();
    }

    public function deleteComments($post_id = null )
    {
        if (!is_null ($post_id)) {
            $post_id = (int) $post_id;
            self::$db->query("DELETE FROM ".self::$tableName." WHERE post_id = ?", [$post_id]);
            return true;
        }
        return false;
    }
}


?>