<?php 

// On déclare l'espace de nom
namespace App\Controllers;

// On utilise la class
use App\Models\User;
use App\Models\Post;
use App\Services\Utils;

// On déclare la class AdminHomeController
Class AdminHomeController extends AbstractController
{ 
    // On déclare la fonction "__construct()"
    public function __construct()
    {
        if (!Utils::isRole('ROLE_ADMIN')) {
            header('Location: ?page=home');
        }
    }
    // Déclaration de la fonction "index()"
    public function index(){
        $title = "Welcome to the Admin Home";
        $userObj = new User();
        $users = $userObj->getAll(  null,"  SELECT * FROM post
                                            inner join comment
                                            on post.id = comment.post_id
                                            inner join user
                                            on post.user_id = user.id
                                            inner join contact
                                            on user.id = contact.user_id");
        $template = './views/template_admin_home.phtml';
        $this->render($template,['title'=>$title,'users'=>$users]);
    }
}