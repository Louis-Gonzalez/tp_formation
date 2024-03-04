<?php

// On déclare l'espace de nom
namespace App\Controllers;

// On utilise la class
use App\Models\Post;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;

// On déclare la class DetailsController
class DetailsController extends AbstractController
{
    // Déclaration de la fonction "index()"
    public function index()
    {
        $title = "Details";
        $post_id = (int)$_GET['id'];
        var_dump($_SESSION['user']['id']);

        $user_id = (int)$_SESSION['user']['id'];
        $detailsObj = new Post();

        $post = $detailsObj->getPostById($post_id);

        // on va chercher l'id de l'user
        if (isset($_SESSION['user']['id'])){
            $user_id = $_SESSION['user']['id'];
        }

        $template = './views/template_details_card.phtml';
        $this->render($template, [
                                    'title' => $title,
                                    'post' => $post,
                                    'user_id' => $user_id,
                                    'post_id' => $post_id,
                                ]);

        $post_id_to_update = (int)$_GET['post_id'];
        if(isset($_POST['comment']) && !empty($_POST['comment']))
        {
            $commentObj = new Comment();
            $comment = $commentObj->updateComment("  SELECT *,user.id as author, comment.id as comment_id FROM comment 
                inner join user 
                on comment.user_id = user.id 
                inner join contact 
                on user.id = contact.user_id 
                WHERE post_id = :post_id")
        }
    }
}



// // on ajoute le commentaire
// if(isset($_POST['comment']) && !empty($_POST['comment'])){
//     $description = $_POST['comment'];
//     $sql = $db->prepare("INSERT INTO comment (user_id, post_id, description) VALUES (:user_id, :post_id, :description)");
//     $sql->bindParam(':user_id', $user_id );
//     $sql->bindParam(':post_id', $post_id);
//     $sql->bindParam(':description', $description);
//     $sql->execute();

// }

// // on récupère les posts
// if ($db){
//     // requete sql pour recupérer les data de la table post 
//     $sql = $db->prepare("SELECT * FROM post join contact on post.user_id = contact.user_id WHERE post.id = :id");  
//     $sql->bindParam(':id', $post_id);
//      // exécute la requete
//     $sql->execute();
//     // on va charger les posts vers template
//     $post = ($sql->fetch(PDO::FETCH_ASSOC)); 

//     // ici on est obligé de donner un alias user.id en author car , il y a plusieurs id
//     $sql = $db->prepare("SELECT *,user.id as author, comment.id as comment_id FROM comment join user on comment.user_id = user.id join contact on user.id = contact.user_id WHERE            post_id = :post_id");
//     $sql->bindParam(':post_id', $post_id);
//     $sql->execute();
//     // on va changer les author et son avatar
//     $comments = ($sql->fetchAll(PDO::FETCH_ASSOC));
// }


// // on charge la vue
// include "./views/base.phtml";

?>