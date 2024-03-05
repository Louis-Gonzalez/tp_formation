<?php 

// On déclare l'espace de nom
namespace App\Models;

// On utilise la class DataBase
use App\Services\DataBase;

// Déclaration de la class Contact
class Contact extends  AbstractTable
{
    // propriétés des données : on appelle l'idratation des données
    protected ?int $user_id = null;
    protected ?string $lastname = null;
    protected ?string $firstname = null;
    protected ?string $address1 = null;
    protected ?string $address2 = null;
    protected ?string $zip = null;
    protected ?string $city = null;
    protected ?string $state = null;
    protected ?string $message = null;
    private ?string $create_at = null;
    protected ?string $update_at =null;

    // Création des setters
    public function setUser_id(?int $user_id) : void
    {
        $this->user_id = $user_id;
    }
    public function setLastname(?string $lastname) : void
    {
        $this->lastname = $lastname;
    }
    public function setFirstname(?string $firstname) : void
    {
        $this->firstname = $firstname;
    }
    public function setAddress1(?string $address1) : void
    {
        $this->address1 = $address1;
    }
    public function setAddress2(?string $address2) : void
    {
        $this->address2 = $address2;
    }
    public function setZip(?string $zip) : void
    {
        $this->zip = $zip;
    }
    public function setCity(?string $city) : void
    {
        $this->city = $city;
    }
    public function setState(?string $state) : void
    {
        $this->state = $state;
    }
    public function setMessage(?string $message) : void
    {
        $this->message = $message;
    }
    public function setCreate_at() : void
    {
        $this->create_at = date("Y-m-d H:i:s");
    }
    public function setUpdate_at() : void
    {
        $this->update_at = date("Y-m-d H:i:s");
    }
    // On crée une fonction qui rtourne un tableau de tous les champs de la table 'contact'
    public function toArray() 
    {
        $contactArray = [
                        $this->user_id,
                        $this->lastname,
                        $this->firstname,
                        $this->address1,
                        $this->address2,
                        $this->zip,
                        $this->city,
                        $this->state,
                        $this->message,
                        $this->create_at,
                        $this->update_at
                    ];
        return $contactArray;
    }
    // // propriétés $db pour stocker PDO
    // private $db;
    
    // public function __construct() {
    //     $this->db = new DataBase();
    // }

    // // fonction qui permet de récupérer tous les contacts
    //     public function getAll($nb=null,$query="SELECT * FROM contact ORDER BY id DESC " ) {
    //     // ici on limite le nombre d'utilisateurs sélectionés si $nb est renseigné sinon il prend tout
    //     $limit = !is_null($nb) ? " LIMIT $nb" : ""; 
    //     $contacts = $this->db->selectAll($query.$limit);
    //     return $contacts;
    // }
}


?>