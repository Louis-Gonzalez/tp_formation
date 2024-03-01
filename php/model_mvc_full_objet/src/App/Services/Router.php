<?php

// l'espace nom met des anti-slashs et "App" est le nom du projet
namespace App\Services; 
/**
 * very simple Class Router
 * Based on $_GET['page]
 */
class Router
{
    private $page;
    public function __construct(){
        $this->setPage();
    }
    public function setPage(){
        $this->page = isset($_GET['page']) ? strtolower($_GET['page']) : 'home';
    }
    public function getPage(){
        return $this->page;
    }
}
