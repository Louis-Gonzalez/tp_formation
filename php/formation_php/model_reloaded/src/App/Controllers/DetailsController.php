<?php

// On déclare l'espace de nom
namespace App\Controllers;

// On utilise la class
use App\Models\Post;
use App\Models\PostManager;
use App\Models\Comment;
use App\Models\CommentManager;
use App\Models\Contact;
use App\Models\ContactManager;
use App\Models\User;
use App\Models\UserManager;
use App\Models\AbstractManager;
use App\Services\Utils;

// On déclare la class DetailsController
class DetailsController extends AbstractController
{
    // Déclaration de la fonction "index()"
    public function index()
    {
        $post_id = (int) $_GET['id'];
        $manager = new PostManager();
        $sql= " SELECT post.*, contact.firstname, contact.lastname 
                FROM post, contact 
                WHERE post.id=?AND post.user_id=contact.user_id 
                LIMIT 1";
        $post = $manager->getAllBy($sql, [$post_id]);

        // on va chercher les commentaires
        $sql = "        SELECT *,user.id as author, comment.id as comment_id 
                        FROM comment 
                        inner join user 
                        on comment.user_id = user.id 
                        inner join contact 
                        on user.id = contact.user_id 
                        WHERE post_id = $post_id";
        $c_manager = new CommentManager();

        $comments = $c_manager->getAll(null, $sql);

        $template = './views/template_details_card.phtml';
        $this->render($template, [
                                    'post' => $post,
                                    'post_id' => $post_id,
                                    'comments' => $comments,
                                    // 'lastname' => $lastname,
                                    // 'firstname' => $firstname
                                ]);

    }

        // // on va chercher l'id de l'user
        // if (isset($_SESSION['user']['id'])){
        // $user_id = $_SESSION['user']['id'];
        // }

    // on va ajouter un commentaires 
    public function add_comment()
    {
        $update_at = date("Y-m-d H:i:s");
        $post_id = (int) $_GET['id'];
        $user_id = (int) $_SESSION['user']['id'];
        if (isset($_POST['comment']) && !empty($_POST['comment']))
        {
            $c_manager = new CommentManager();
            $description = Utils::cleaner($_POST['comment']);
            $insert = $c_manager->insert([  
                                            $user_id, 
                                            $post_id,
                                            $description,
                                            $update_at
                                        ]);
        }
        header('Location: ?page=details&id='.$post_id);
    }
    // On va supprimer un commentaire
    public function delete_comment()
    {
        $post_id = (int) $_GET['id'];
        $comment_id = (int) $_GET['comment_id'];
        $c_manager = new CommentManager();
        $delete = $c_manager->delete($comment_id);
        header('Location: ?page=details&id='.$post_id);
    }

    // On va modifier un commentaire
    public function update_comment()
    {
        $post_id = (int) $_GET['id'];
        $comment_id = (int) $_GET['comment_id'];
        $c_manager = new CommentManager();
        $description = Utils::cleaner($_POST['comment']);
        $update_at = date("Y-m-d H:i:s");
        $update = $c_manager->update($comment_id, $description, $update_at);
        header('Location: ?page=details&id='.$post_id);
    }

    // $post_id_to_update = (int)$_GET['post_id'];
    // if(isset($_POST['comment']) && !empty($_POST['comment']))
    // {
    //     $commentObj = new Comment();
    //     $comment = $commentObj->updateComment("  SELECT *,user.id as author, comment.id as comment_id FROM comment 
    //         inner join user 
    //         on comment.user_id = user.id 
    //         inner join contact 
    //         on user.id = contact.user_id 
    //         WHERE post_id = :post_id");
    // }
}



?>