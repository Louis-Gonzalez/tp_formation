<?php 

// On déclare l'espace de nom qui vient du router
namespace App; 

// On démarre la session
session_start();

// On lui dit d'utiliser App dans le router
use App\Services\Router; 


require_once('autoload.php');
require_once('config.php');


// page doit être affichée dans le navigateur
// ?page = .....
// on instancie  la class Router en utilisant "new Router()"
$router = new Router();
$page = $router->getPage();

// exemple : App\controllers\homeController
$controllerName = "App\Controllers\\".ucfirst($page)."Controller" ; 

// ici on a un controller dynamique qui instancié "class $controllerName" qui va créer l'objet "homeController" 
// via la commande "new $controllerName()"
$controller = new $controllerName(); 

// on appelle la methode index de la class "HomeController.php"
$controller->index();

?>
