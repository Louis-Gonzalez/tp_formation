<?php 

// On déclare l'espace de nom qui vient du router
namespace App; 

// On appelle la class Authenficator pour demarrer la session
use App\Services\Authenticator; //  est équivalent de session_start(); car dans la class Authenticator on appelle la session_start();

// On lui dit d'utiliser App dans le router
use App\Services\Router; 

// On charge la config 
require_once('autoload.php');
require_once('config.php');

// On instancie la class Authenticator pour se connecter
$session = new Authenticator();

// page doit être affichée dans le navigateur
// ?page = .....
// on instancie  la class Router en utilisant "new Router()"
$router = new Router();
$page = $router->getPage();

$router->run();

?>
