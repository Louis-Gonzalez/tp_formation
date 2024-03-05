<?php

// l'espace nom met des anti-slashs et "App" est le nom du projet
namespace App\Services; 
/**
 * very simple Class Router
 * Based on $_GET['page]
 * $page =home&action=new
 * page -> Controller, action -> method
 */
class Router
{
    private $page;
    private $action;

    public function __construct(){
        $this->setPage();
        $this->setAction();
    }
    public function setPage(){
        $this->page = isset($_GET['page']) ? strtolower($_GET['page']) : 'home';
    }
    public function getPage(){
        return $this->page;
    }
    public function setAction(){
        $this->action = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';
    }
    public function getAction(){
        return $this->action;
    }

    public function run(){
        // On définit le controllr par défaut
        $controllerName = $controllerName = "App\Controllers\\NotfoundController";
        // On définit la methode par défaut
        $action = "index";

        // Si le fichier existe alors on intancie la class
        if(file_exists("src/App/Controllers/".$this->getPage()."Controller.php")){
            // exemple : App\controllers\homeController
            $controllerName = "App\Controllers\\".ucfirst($this->getPage())."Controller";
        }

        // si la méthode correspondante existe alors on exécute la methode "method_exists() est une fonction natif de php"
        if(method_exists($controllerName, $this->getAction())){
            $action = $this->getAction();
        }

        // On peut donc ensuite instancier la class Controller
        // via la commande "new $controllerName()"
        $controller = new $controllerName(); 

        // On appelle la methode action par défaut
        // on appelle la methode action()
        $controller->$action();
    }

}
