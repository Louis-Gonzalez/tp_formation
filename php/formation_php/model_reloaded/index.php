<?php 

// On déclare l'espace de nom qui vient du router
namespace App; 

// On démarre la session
session_start();

// On lui dit d'utiliser App dans le router
use App\Services\Router; 

// On charge la config 
require_once('autoload.php');
require_once('config.php');


// page doit être affichée dans le navigateur
// ?page = .....
// on instancie  la class Router en utilisant "new Router()"
$router = new Router();
$page = $router->getPage();

$router->run();

?>
