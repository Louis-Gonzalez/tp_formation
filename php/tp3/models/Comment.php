<?php 
// on appelle le service DataBase
require_once('./class/DataBase.php');

// Déclaration de la class Comment
class Comment {
    // propriétés $db pour stocker PDO
    private $db;
    
    public function __construct() {
        $this->db = new DataBase();
    }

    public function getAll($nb=null,$query="SELECT * FROM comment ORDER BY id DESC " ) {
        // ici on limite le nombre d'utilisateurs sélectionés si $nb est renseigné sinon il prend tout
        $limit = !is_null($nb) ? " LIMIT $nb" : ""; 
        $comments = $this->db->selectAll($query.$limit);
        return $comments;
    }
}

?>