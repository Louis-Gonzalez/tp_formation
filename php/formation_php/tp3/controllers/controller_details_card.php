<?php

// on appelle la bdd
$db = connectDB();
$post = [];

// on va récupérer l'id du post 
$post_id = (int)$_GET['id'];  

// on crée des variables 
$user_id = $_SESSION['user']['id'];

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
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $post = ($sql->fetch(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 
    // ici on est obligé de donner un alias user.id en author car , il y a plusieurs id
    $sql = $db->prepare("SELECT *,user.id as author FROM comment join user on comment.user_id = user.id join contact on user.id = contact.user_id WHERE post_id = :post_id");
    $sql->bindParam(':post_id', $post_id);
    $sql->execute();

    $comments = ($sql->fetchAll(PDO::FETCH_ASSOC));

    // echo "<pre>";
    // var_dump($post);
    // echo "</pre>";
    
    //var_dump($GLOBALS) ;
    //var_dump($post);
    
}


// on charge la vue
include "./views/base.phtml";

?>