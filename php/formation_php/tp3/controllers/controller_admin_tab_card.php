<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin
if(!isset($_SESSION['user']['roles']) || !in_array('ROLE_ADMIN', json_decode($_SESSION['user']['roles']))){
    header("Location: ?page=home");
    exit;
}

// on appelle la bdd
$db = connectDB();
$posts = [];

// on récupère les posts
if ($db){
    $sql = $db->query("SELECT * FROM post ORDER BY id DESC");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $posts = ($sql->fetchAll(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 
    //var_dump($posts);
}

// si non rediriger vers la page d'accueil
// on charge la vue
include "./views/base.phtml";
?>