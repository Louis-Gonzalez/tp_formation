<?php 

// On déclare l'espace de nom
namespace App\Controllers;

use App\Controllers;

use App\Controllers\AbstractController;
use App\Models\PostManager;
use App\Models\User;

// On déclare la class HomeController
class HomeController extends AbstractController
{ 
    // Déclaration de la fonction "index()"
    public function index(){
        $title = "Hello OOP World";
        $postObj = new PostManager();
        $posts = $postObj->getAll(3);
        $template = './views/template_home.phtml';
        $this->render($template,['title' => $title, 'posts' => $posts]);
    }

    public function new(){
        $title = "Hello OOP World --> New Action !!!";
        $post = new PostManager();
        $posts = $post->getAll(3);
        $template = './views/template_home_new.phtml';
        $this->render($template,['title' => $title, 'posts' => $posts]);
    }
}

?>

