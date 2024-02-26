<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin


// on appelle la bdd
$db = connectDB();
// var_dump($db);
$post = [];

$post_id = (int)$_GET['id']; // on va récupérer l'id du post  
// var_dump($post_id);


// on crée des variables 
$user_id = $_SESSION['user']['id'];


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
    
    $sql = $db->prepare("SELECT * FROM post join contact on post.user_id = contact.user_id WHERE post.id = :id");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->bindParam(':id', $post_id);
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $post = ($sql->fetch(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 

    $sql = $db->prepare("SELECT * FROM comment join user on comment.user_id = user.id join contact on user.id = contact.user_id WHERE post_id = :post_id");
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