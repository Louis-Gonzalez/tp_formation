<?php 

// On déclare l'espace de nom
namespace App\Services;

// On appelle les class，
use App\Models\UserManager;
use App\Models\User;

// On declare la class Authenticator
class Authenticator {
    
    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
    }

    private function setSession($userData)
    {
        $_SESSION['user'] = $userData;
    }

    public function login($email, $password)
    {
        // Au départ on est pas loggé
        $isLogged = false;
        $userManager = new UserManager();
        // On recupère l'utilisateur par son email
        $user = $userManager->getUserByEmail($email);
        if ($user){
            $isLogged = password_verify($password, $user['password']); // ici on compare le mot de passe saisi et celui de la BDD
        }
        if($isLogged){
            // On charge toutes less informations de l'utilisateur
            $this->setSession($user);
        }
        // on récupère la valeur de $isLogged true ou false
        return $isLogged;
    }
    public function logout()
    {
        session_destroy();
    }
    // On declare la fonction qui test le rôle et la met en static pour pouvoir l'utiliser de partout
    static function isRole($role) {
        return isset($_SESSION['user']) && in_array($role, json_decode($_SESSION['user']['roles']));
    }
}


?>