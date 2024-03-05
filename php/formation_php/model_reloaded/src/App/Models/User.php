<?php 

// On déclare l'espace de nom
namespace App\Models;

// On utilise la class DataBase
use App\Services\DataBase;

// Déclaration de la class User
class User extends AbstractTable
{
    protected ?string $email=null;
    protected ?string $avatar=null;
    protected ?string $password=null;
    protected ?string $roles=null;
    private ?string $register_at=null;
    protected ?string $update_at=null;
    
    // // propriétés $db pour stocker PDO
    // private $db;
    
    // public function __construct() {
        
    //     $this->db = new DataBase();
    // }
    // // fonction qui permet de récupérer tous les users
    // public function getAll($nb=null,$query="SELECT * FROM user ORDER BY id DESC " ) {
    //     // ici on limite le nombre d'utilisateurs sélectionés si $nb est renseigné sinon il prend tout
    //     $limit = !is_null($nb) ? " LIMIT $nb" : ""; 
    //     $users = $this->db->selectAll($query.$limit);
    //     return $users;
    // }
    // // Fonction qui récupère le user par son id
    // public function getUserById($id) {
    //     $query = "SELECT * FROM user WHERE id = $id";
    //     $user = $this->db->select($query);
    //     return $user;
    // }

    // // public function getUserByEmail($email) {
    // //     $query = "SELECT * FROM user WHERE email = :email";
    // //     $user = $this->db->select($query, ['email' => $email]);
    // //     return $user;
    // // }

    // public function login($email) {
    //     $query = 
    //             "SELECT * FROM user 
    //             inner join contact on user.id = contact.user_id 
    //             WHERE email = :email";
    //             $user = $this->db->select($query, ['email' => $email]);
    //     return $user;
    // }

    // public function logout() {
    //     // on detruit la session
    //     session_destroy();
    //     // on redirige vers la home 
    //     header("Location:?page=home");
    // }

}