<?php

// on vérifie le rôle 
if(!Utils::isRole("ROLE_ADMIN") && $_GET['comment_id'] != $_SESSION['user']['id'])
{
    header("Location: ?page=home");
    exit;
}

// on appelle la bdd
$db = Utils::connectDB();
$comments = [];
$post_id = (int)$_GET['id'];

// on va récupérer l'id commentaire
$comment_id_to_update = (int)$_GET['comment_id']; 

if ($db){
    // requete sql pour recupérer les data de la table comment
    $sql = $db->query("SELECT * FROM comment WHERE id = $comment_id_to_update");  
    // exécute la requete
    $sql->execute(); 
    // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 
    $comment = ($sql->fetch(PDO::FETCH_ASSOC)); 
    Utils::dump($comment);

    // echo "<pre>";
    // var_Utils::dump($GLOBALS) ;
    // echo "</pre>";

    // il faut qu'il soit set et non vide
    if(isset($_POST['description']) && !empty($_POST['description'])) { 
        $description = $_POST['description'];
        // // on modiifie la card sur la bdd
        $sql = $db->prepare("UPDATE comment SET description = :description WHERE id = $comment_id_to_update");

        // on lie pramètres
        $sql->bindParam(':description', $description);
        // exécute la requete
        $sql->execute(); 
        // redirection vers 
        header("Location: ?page=details_card&id=".$_GET['id']);
        exit;
    }

}

// on charge la vue
include "./views/base.phtml";

?>