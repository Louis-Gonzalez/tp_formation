<?php 

// On déclare l'espace de nom
namespace App\Models;

// On utilise la class DataBase
use App\Services\DataBase;

// Déclaration de la class Contact
class Comment {
    // propriétés $db pour stocker PDO
    private $db;
    
    public function __construct() {
        $this->db = new DataBase();
    }

    // fonction qui permet de récupérer tous les contacts
    public function getAll($nb=null,$query="SELECT *,user.id as author, comment.id as comment_id FROM comment 
                                            inner join user 
                                            on comment.user_id = user.id 
                                            inner join contact 
                                            on user.id = contact.user_id 
                                            WHERE post_id = :post_id")
    {
        // ici on limite le nombre d'utilisateurs sélectionés si $nb est renseigné sinon il prend tout
        $limit = !is_null($nb) ? " LIMIT $nb" : ""; 
        $contacts = $this->db->selectAll($query.$limit);
        return $contacts;
    }

    public function insertComment($user_id, $post_id, $description){
        $query ="   INSERT INTO comment (user_id, post_id, description) 
                    VALUES (:user_id, :post_id, :description)";
        $params = [
            'user_id' => $user_id,
            'post_id' => $post_id,
            'description' => $description
        ];
        $insert = $this->db->query($query,$params);
        return $insert;
        // retourne PDO au cas où on souhaite utiliser le last insert id.
    }

    public function deleteComment($comment_id){
        $query = "  DELETE FROM comment 
                    WHERE id = $comment_id";
        $delete = $this->db->query($query);
        return $delete;
    }

    public function getCommentById($comment_id){
        $query = "  SELECT * FROM comment
                    INNER JOIN contact ON comment.user_id = contact.user_id
                    WHERE comment.id = $comment_id";
        $comment = $this->db->select($query);
        return $comment;
    }

    public function updateComment($comment_id, $description){
        $query = "  UPDATE comment SET description = :description 
                    WHERE id = $comment_id";
        $params = [
            'description' => $description
        ];
        $update = $this->db->query($query,$params);
        return $update;
    }
}

?>