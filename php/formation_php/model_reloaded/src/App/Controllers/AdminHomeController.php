<?php 

// On déclare l'espace de nom
namespace App\Controllers;

// On utilise la class
// use App\Models\User;
// use App\Models\Post;
// use App\Models\AbstractManager;
use App\Models\PostManager;
use App\Services\Authenticator;

// On déclare la class AdminHomeController
Class AdminHomeController extends AbstractController
{ 

    // On déclare la fonction "__construct()"
    public function __construct()
    {
        // On appelle la fonction "isRole()"
        if (!Authenticator::isRole('ROLE_ADMIN')) {
            header('Location: ?page=home');
        }
    }

    public function index()
    {
        $manager = new PostManager();
        $posts = $manager->getAll();
        $template = './views/template_admin_home.phtml';
        $this->render($template, ['posts' => $posts]);
    }

}