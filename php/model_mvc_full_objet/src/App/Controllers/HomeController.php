<?php 

// On déclare l'espace de nom
namespace App\Controllers;

use App\Controllers;
use App\Models\Post;
use App\Models\User;

// On déclare la class HomeController
class HomeController
{ 
    // Déclaration de la fonction "index()"
    public function index(){
        $title = "Hello OOP World";
        $post = new Post();
        $posts = $post->getAll(3);
        $template = './views/template_home.phtml';
        $this->render($template,['title' => $title, 'posts' => $posts]);

    }
    // Déclaration de la fonction "render()"
    public function render($templatePath, $data){
        // Ouvrir la mémoire tampon du serveur
        // https://www.php.net/manual/en/function.ob-start.php
        ob_start();
        // Inclure le fichier de template
        include $templatePath;
        // On charge la mémoire tampon dans le template
        // https://www.php.net/manual/en/function.ob-get-clean.php
        $template = ob_get_clean();
        // Afficher le template avec les data entrées en paramètre et qui le chemin de "$template"
        include './views/base.phtml';
    }

}

?>
