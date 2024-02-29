<?php

// on appelle la bdd
$db = Utils::connectDB();
$post = [];

// on va récupérer l'id du post 
$post_id = (int)$_GET['id'];  

// on va chercher l'id de l'user
if (isset($_SESSION['user']['id'])){
    $user_id = $_SESSION['user']['id'];
}

// on ajoute le commentaire
if(isset($_POST['comment']) && !empty($_POST['comment'])){
    $description = $_POST['comment'];
    $sql = $db->prepare("INSERT INTO comment (user_id, post_id, description) VALUES (:user_id, :post_id, :description)");
    $sql->bindParam(':user_id', $user_id );
    $sql->bindParam(':post_id', $post_id);
    $sql->bindParam(':description', $description);
    $sql->execute();

}

// on récupère les posts
if ($db){
    // requete sql pour recupérer les data de la table post 
    $sql = $db->prepare("SELECT * FROM post join contact on post.user_id = contact.user_id WHERE post.id = :id");  
    $sql->bindParam(':id', $post_id);
     // exécute la requete
    $sql->execute();
    // on va charger les posts vers template
    $post = ($sql->fetch(PDO::FETCH_ASSOC)); 
    // ici on est obligé de donner un alias user.id en author car , il y a plusieurs id
    $sql = $db->prepare("SELECT *,user.id as author, comment.id as comment_id FROM comment join user on comment.user_id = user.id join contact on user.id = contact.user_id WHERE post_id = :post_id");
    $sql->bindParam(':post_id', $post_id);
    $sql->execute();
    // on va changer les author et son avatar
    $comments = ($sql->fetchAll(PDO::FETCH_ASSOC));
}


// on charge la vue
include "./views/base.phtml";

?>