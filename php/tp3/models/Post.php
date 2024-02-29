<?php 
// on appelle le service DataBase
require_once('./class/DataBase.php');


// Déclaration de la class Post
class Post {
    // propriétés $db pour stocker PDO
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }
    // fonction qui permet de récupérer tous les posts
    public function getAll($nb=null,$query="SELECT * FROM post ORDER BY id DESC " ) {
        // ici on limite le nombre d'articles récupérés si $nb est renseigné sinon il prend tout
        $limit = !is_null($nb) ? " LIMIT $nb" : ""; 
        $posts = $this->db->selectAll($query.$limit);
        return $posts;
    }
    // fonction qui permet d'insérer un post
    public function insertPost($title,$description,$image,$user_id){ 
        $user_id = $_SESSION['user']['id'];
        $query = "INSERT INTO post (title, description, image, user_id) VALUES (:title, :description, :image, :user_id)";
        $params = [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'user_id' => $user_id,
        ];
        $insert = $this->db->query($query,$params);
        return $insert;
        // retourne PDO au caso ù on souhaite utiliser le last insert id.
    }

}


?>