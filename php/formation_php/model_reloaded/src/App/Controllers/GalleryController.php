<?php 

// On déclare l'espace de nom
namespace App\Controllers;

// On utilise la class 
use App\Controllers\AbstractController;
use App\Models\PostManager;
use App\Models\UserManager;
// use App\Models\User;
// use App\Models\Contact;

// On déclare la class HomeController
class GalleryController extends AbstractController
{ 
    // Déclaration de la fonction "index()"
    public function index()
    {
        $title = "Welcome to the Gallery";
        $dbPost = new PostManager();
        $posts = $dbPost->getAll(null,"    SELECT post.*, contact.firstname, contact.lastname 
                                            FROM post, contact 
                                            WHERE post.user_id=contact.user_id 
                                            order by create_at desc");
        // exemple de la manager
        $dbUser = new UserManager();
        $users = $dbUser->getAll();
        $user_14 = $dbUser->getOneById(14);
        // var_dump($dbUser);
        $template = './views/template_gallery.phtml';
        $this->render($template,[
                                    'title'=>$title,
                                    'posts'=>$posts, 
                                    'users'=>$users,
                                    'user_14'=>$user_14
                                ]);
    }

}
// $posts = $postObj->getAll(null,"      SELECT post.*, contact.firstname, contact.lastname 
// //                                     FROM post, contact 
// //                                     WHERE post.user_id=contact.user_id 
// //                                     order by create_at desc");

?>
