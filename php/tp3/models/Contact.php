<?php 
// on appelle le service DataBase
require_once('./class/DataBase.php');

// Déclaration de la class Contact
class Contact {
    // propriétés $db pour stocker PDO
    private $db;
    
    public function __construct() {
        $this->db = new DataBase();
    }

    // fonction qui permet de récupérer tous les contacts
    public function getAll($nb=null,$query="SELECT * FROM contact ORDER BY id DESC " ) {
        // ici on limite le nombre d'utilisateurs sélectionés si $nb est renseigné sinon il prend tout
        $limit = !is_null($nb) ? " LIMIT $nb" : ""; 
        $contacts = $this->db->selectAll($query.$limit);
        return $contacts;
    }
}


?>