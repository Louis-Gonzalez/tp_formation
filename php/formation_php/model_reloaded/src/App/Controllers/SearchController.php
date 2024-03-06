<?php



// On déclare l'espace de nom
namespace App\Controllers;

use App\Models\Post;
use App\Models\PostManager;

class SearchController extends AbstractController
{

    // Déclaration de la fonction "index()"
    public function index() {
        
        $keywords = strip_tags(urldecode(trim($_GET['keywords'])));// "trim" sert à enlever les espaces avant après le keywords "urlcode" sert à décoder les caractères spéciaux
        // et strip_tags sert à enlever toutes balises tags <....>
        $manager = new PostManager();

        $post = $manager->getAll(
                                    null, "SELECT * FROM post 
                                    WHERE title LIKE '%".$keywords."%' 
                                    OR description LIKE '%".$keywords."%' 
                                    OR image LIKE '%".$keywords."%' 
                                    ORDER BY id desc"
                                );
        $template = './views/template_search.phtml';
        // ici dans le tableau : ['posts' => $post, 'keywords' => $keywords] on peut penser à modifier ici pour faire le lien dans le template
        $this->render($template,['posts' => $post, 'keywords' => $keywords]); 
    }
}

?>