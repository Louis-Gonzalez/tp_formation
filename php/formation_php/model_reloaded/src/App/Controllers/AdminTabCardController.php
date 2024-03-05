<?php

// On déclare l'espace de nom
namespace App\Controllers;

// On appelle les classes

use App\Models\CommentManager;
use App\Models\Post;
use App\Models\PostManager;
use App\Services\Utils;

// On déclare la class AdminTabCardController
class AdminTabCardController extends AbstractController
{
    public function index()
    {
        $manager = new PostManager();
        $posts = $manager->getAll();
        $template = './views/template_admin_tab_card.phtml';
        $this->render($template, ['posts' => $posts]);
    }

    public function createCard()
    {
        $user_id = $_SESSION['user']['id'];
        $update_at = date("Y-m-d H:i:s");
        $manager = new PostManager();
        
                // Vérification des champs qui ont update dans le formulaire
                if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image']) 
                && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['image'])) 
            {
                $title= Utils::cleaner($_POST['title']);
                $description = Utils::cleaner($_POST['description']);
                $image = Utils::cleaner($_POST['image']);
                $insert = $manager->insert([
                                            $_SESSION['user']['id'],
                                            $title, 
                                            $description, 
                                            $image, 
                                            date("Y-m-d H:i:s"), 
                                            ]);
                header ('Location: ?page=admintabcard');
            }
            $template = './views/template_admin_create_card.phtml';
            $this->render($template,[]);
    }

    public function delete()
    {   
        // on récupère le id
        $post_id = (int) $_GET['id'];
        // on supprime le commentaire (enfant du post)
        $manager = new CommentManager();
        $deleteComment = $manager->deleteComments($post_id);
        // on supprime le post ensuite (post est parent de comment)
        $manger = new PostManager();
        $delete = $manger->delete($post_id);
        header ('Location: ?page=admintabcard');
    }

    public function update()
    {
        $user_id = $_SESSION['user']['id'];
        $update_at = date("Y-m-d H:i:s");
        $post_id = (int) $_GET['id'];
        $manager = new PostManager();


        // Vérification des champs qui ont update dans le formulaire
        if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image']) 
        && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['image'])) 
        {   
            $title= Utils::cleaner($_POST['title']);
            $description = Utils::cleaner($_POST['description']);
            $image = Utils::cleaner($_POST['image']);
            $update = $manager->update($post_id, [
                                                    $user_id,
                                                    $title,
                                                    $description,
                                                    $image,
                                                    $update_at
                                                ]);
            header ('Location: ?page=admintabcard');
        };
        $post = $manager->getOneById($post_id);
        $template = './views/template_admin_update_card.phtml';
        $this->render($template, [
            'post' => $post,
            'id' => $post_id
        ]);
    }
    
    public function search()
    {
        $keywords = $_GET['keywords'];
        $manager = new PostManager();
        $posts = $manager->getAll(
            null, "SELECT * FROM post WHERE title LIKE '%".$keywords."%' OR description LIKE '%".$keywords."%' OR image LIKE '%".$keywords."%' ORDER BY id"
        );
        $template = './views/template_admin_tab_card.phtml';
        $this->render($template, ['posts' => $posts]);
    }
}

?>