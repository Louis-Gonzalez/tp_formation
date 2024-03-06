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
        // si on trouve un cookie qui porte le nom définis dans la config 
        // Alors on crée une session à partir des infos du cookie
        if(isset($_COOKIE[CONFIG_COOKIE_NAME]) && !empty($_COOKIE[CONFIG_COOKIE_NAME])){
            $cookieData = unserialize($_COOKIE[CONFIG_COOKIE_NAME]);
            // On appel la fonction setSession avec les infos du cookie
            $this->setSession($cookieData);
        }
        // Quel est le choix de l'utilisateur par rapport aux cookies ?
        if(isset($_POST['cookie_yes'])) $_SESSION['cookie'] = true;
        if(isset($_POST['cookie_no'])) $_SESSION['cookie'] = false;
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
        if(isset($_COOKIE[CONFIG_COOKIE_NAME])){
            setcookie(CONFIG_COOKIE_NAME, '', time() - 1);
        }
        session_destroy();
    }
    // On declare la fonction qui test le rôle et la met en static pour pouvoir l'utiliser de partout
    static function isRole($role) {
        return isset($_SESSION['user']) && in_array($role, json_decode($_SESSION['user']['roles']));
    }
}


?>