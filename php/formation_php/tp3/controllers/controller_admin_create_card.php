<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin
if(!isset($_SESSION['user']['roles']) || !in_array('ROLE_ADMIN', json_decode($_SESSION['user']['roles']))){
    header("Location: ?page=home");
    exit;
}
// s'il y a le role_admin alors je fais le traitement
// on appelle la bdd
$db = connectDB();
$posts = [];

// var_dump($GLOBALS);

if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['image']) ){
    $title = htmlentities(strip_tags($_POST['title'])); // ceci va nettoyer le code de tout les symboles pour garder que les alphanumériques  
    $description = htmlentities(strip_tags($_POST['description']));
    $image = htmlentities(strip_tags($_POST['image']));

    // on ajoute la card à la bdd
    $sql = $db->prepare("INSERT INTO post (title, description, image) VALUES
    (:title, :description, :image)");
    // on lie les paramètres
    $sql->bindParam(':title', $title);
    $sql->bindParam(':description', $description);
    $sql->bindParam(':image', $image);

    // on exécute la requête
    $sql->execute();

    // redirection après ajout de la card
    header("Location: ?page=admin_tab_card");
    exit;
}

// si non rediriger vers la page d'accueil
// on charge la vue
include "./views/base.phtml";
?>