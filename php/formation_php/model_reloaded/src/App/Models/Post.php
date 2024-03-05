<?php 

// On déclare l'espace de nom
namespace App\Models;

// On utilise la class DataBase
use App\Services\DataBase;

// Déclaration de la class Post
class Post extends  AbstractTable
{

    // propriétés des données : on appelle l'idratation des données
    protected ?int $user_id = null;
    protected ?string $title = null;
    protected ?string $description = null;
    protected ?string $image = null;
    private ?string $create_at = null;
    protected ?string $update_at =null;

    // Création des setters 
    public function setUser_id(?int $user_id) : void
    {
        $this->user_id = $user_id;
    }
    public function setTitle(?string $title) : void
    {
        $this->title = $title;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function setImage(?string $image) : void
    {
        $this->image = $image;
    }
    public function setCreate_at() : void
    {
        $this->create_at = date("Y-m-d H:i:s");
    }
    public function setUpdate_at() : void
    {
        $this->update_at = date("Y-m-d H:i:s");
    }
    // On crée une fonction qui retourne un tableau de tous les champs de la table 'post'
    public function toArray() 
    {
        $postArray = [
                        $this->user_id,
                        $this->title,
                        $this->description,
                        $this->image,
                        $this->create_at,
                        $this->update_at
                    ];
        return $postArray;
    }


    // // propriétés $db pour stocker PDO
    // private $db;

    // public function __construct() {
    //     $this->db = new DataBase();
    // }
    // // fonction qui permet de récupérer tous les posts
    // public function getAll($nb=null,$query="SELECT * FROM post ORDER BY id DESC ") {
    //     // ici on limite le nombre d'articles récupérés si $nb est renseigné sinon il prend tout
    //     $limit = !is_null($nb) ? " LIMIT $nb" : ""; 
    //     $posts = $this->db->selectAll($query.$limit);
    //     return $posts;
    // }
    // // fonction qui permet d'insérer un post
    // public function insertPost($title,$description,$image,$user_id){ 
    //     $user_id = $_SESSION['user']['id'];
    //     $query = "INSERT INTO post (title, description, image, user_id) VALUES (:title, :description, :image, :user_id)";
    //     $params = [
    //         'title' => $title,
    //         'description' => $description,
    //         'image' => $image,
    //         'user_id' => $user_id,
    //     ];
    //     $insert = $this->db->query($query,$params);
    //     return $insert;
    //     // retourne PDO au cas où on souhaite utiliser le last insert id.
    // }
    
    // // Fonction qui permet de modifier un post
    // public function updatePost($title, $description, $image, $id_to_update){

    //         $query = "UPDATE post SET title = :title, description = :description, image = :image WHERE id = $id_to_update";
    //         $params =[
    //             'title' => $title,
    //             'description' => $description,
    //             'image' => $image,
    //             //'user_id' => $user_id, je ne pense que nous n'avons pas  ceci 
    //         ];
    //     $update = $this->db->query($query,$params);
    //     return $update;
    // }

    // // Fonction qui récupère le post par son id
    // public function getPostById($id_to_update){
    //     $query = "  SELECT * FROM post 
    //                 INNER JOIN contact ON post.user_id = contact.user_id        
    //                 WHERE post.id = $id_to_update";
    //     $post = $this->db->select($query);
    //     return $post;
    // }

    // // Fonction qui permet de rechercher un post
    // public function searchPost($keywords){
    //     $query = "SELECT * FROM post WHERE title LIKE '%".$keywords."%' OR description LIKE '%".$keywords."%' OR image LIKE '%".$keywords."%' ORDER BY id";
    //     $post = $this->db->selectAll($query);
    //     return $post;
    // }
}


?>