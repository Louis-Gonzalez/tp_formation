<?php 

// On déclare l'espace de nom
namespace App\Models;

// On utilise la class DataBase
use App\Services\DataBase;

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
        // retourne PDO au cas où on souhaite utiliser le last insert id.
    }
    
    // Fonction qui permet de modifier un post
    public function updatePost($title, $description, $image, $id_to_update){

            $query = "UPDATE post SET title = :title, description = :description, image = :image WHERE id = $id_to_update";
            $params =[
                'title' => $title,
                'description' => $description,
                'image' => $image,
                //'user_id' => $user_id, je ne pense que nous n'avons pas  ceci 
            ];
        $update = $this->db->query($query,$params);
        return $update;
    }

    // Fonction qui récupère le post par son id
    public function getPostById($id_to_update){
        $query = "SELECT * FROM post WHERE id = $id_to_update";
        $post = $this->db->select($query);
        return $post;
    }

    // Fonction qui permet de rechercher un post
    public function searchPost($keywords){
        $query = "SELECT * FROM post WHERE title LIKE '%".$keywords."%' OR description LIKE '%".$keywords."%' OR image LIKE '%".$keywords."%' ORDER BY id";
        $post = $this->db->selectAll($query);
        return $post;
    }
}


?>