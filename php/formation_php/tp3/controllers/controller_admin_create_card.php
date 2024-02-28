<?php
// on vérifie le rôle 
if(!isRole("ROLE_ADMIN"))
{
    header("Location: ?page=home");
    exit;
}

// on appelle la bdd
$db = connectDB();
$posts = [];

// création des conditions pour ajouter une card
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['image']) ){
    // ceci va nettoyer le code de tout les symboles pour garder que les alphanumériques
    $title = htmlentities(strip_tags($_POST['title']));   
    $description = htmlentities(strip_tags($_POST['description']));
    $image = htmlentities(strip_tags($_POST['image']));
    // on ajoute la card à la bdd
    $sql = $db->prepare("INSERT INTO post (user_id, title, description, image) VALUES 
    (:user_id, :title, :description, :image)");
    // on lie les paramètres
    $sql->bindParam(':title', $title);
    $sql->bindParam(':description', $description);
    $sql->bindParam(':image', $image);
    // ajout de l'id de l'utilisateur qui a ajoutée la card
    $sql->bindParam(':user_id', $_SESSION['user']['id']); 
    // on exécute la requête
    $sql->execute();
    // redirection après ajout de la card
    header("Location: ?page=admin_tab_card");
    exit;
}

// on charge la vue
include "./views/base.phtml";
?>