<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin
if(!isRole("ROLE_ADMIN"))
{
    header("Location: ?page=home");
    exit;
}

// on appelle la bdd
$db = connectDB();
$post = [];
$id_to_update = (int)$_GET['id']; // on va récupérer l'id du post

// on récupère les posts
if ($db){
    $sql = $db->query("SELECT * FROM post WHERE id = $id_to_update");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $post = ($sql->fetch(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 
    //var_dump($posts);

    // echo "<pre>";
    // var_dump($GLOBALS) ;
    // echo "</pre>";

    if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image'])  && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['image']) ){ // il faut qu'il soit set et non vide

        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        // // on modiifie la card sur la bdd
        $sql = $db->prepare("UPDATE post SET title = :title, description = :description, image = :image WHERE id = $id_to_update");

        // on lie pramètres
        $sql->bindParam(':title', $title);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':image', $image);

        $sql->execute(); // exécute la requete

        header("Location: ?page=admin_tab_card");
        exit;
    }

}
// on charge la vue
include "./views/base.phtml";
?>