<?php



// On déclare l'espace de nom
namespace App\Controllers;

use App\Models\Post;

class SearchController extends AbstractController
{

    // Déclaration de la fonction "index()"
    public function index() {
        
        $keywords = strip_tags(urldecode(trim($_GET['keywords'])));// "trim" sert à enlever les espaces avant après lekeywords "urlcode" sert à décoder les caractères spéciaux
        // et strip_tags sert à enlever toutes balises tags <....>
        $postObj = new Post();
        $post = $postObj->searchPost($keywords);
        $template = './views/template_search.phtml';
        // ici dans le tableau : ['posts' => $post, 'keywords' => $keywords] on peut penser à modifier ici pour faire le lien dans le template
        $this->render($template,['posts' => $post, 'keywords' => $keywords]); 
    }

    // Déclaration de la fonction "render()"
    public function render($templatePath, $data){
        // Ouvrir la mémoire tampon du serveur
        ob_start();
        // Inclure le fichier de template
        include $templatePath;
        // On charge la mémoire tampon dans le template
        $template = ob_get_clean();
        // Afficher le template avec les data entrées en param.Xrations et qui le chemin de "$template"
        include './views/base.phtml';
    }
}

?>