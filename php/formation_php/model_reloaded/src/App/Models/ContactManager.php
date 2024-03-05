<?php 

// On déclare l'espace de nom 
namespace App\Models;

// On indique les classes dont on a besoin
use App\Models\Contact;

// On indique la base de données
use App\Services\DataBase;

// On déclare la class ContactManager
class ContactManager extends AbstractManager
{
    public function __construct(){

        // On indique la base de données
        self::$db = new DataBase();
        // On indique le nom de la table
        self::$tableName = 'contact';
        // On indique les classes dont on a besoin
        self::$obj = new Contact();
    }
}


?>