<?php 

// On déclare l'espace de nom
namespace App\Controllers;

// On utilise la class 
use App\Models\Post;
// use App\Models\User;
// use App\Models\Contact;

// On déclare la class HomeController
class GalleryController
{ 
    // Déclaration de la fonction "index()"
    public function index(){
        $title = "Welcome to the Gallery";
        $post = new Post();
        $posts = $post->getAll(null,"SELECT post.*, contact.firstname, contact.lastname FROM post, contact WHERE post.user_id=contact.user_id order by create_at desc");
        $template = './views/template_gallery.phtml';
        $this->render($template,['title'=>$title,'posts'=>$posts]);
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
