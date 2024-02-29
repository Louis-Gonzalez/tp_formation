<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle 
if(!Utils::isRole("ROLE_ADMIN"))
{
    header("Location: ?page=home");
    exit;
}

// on appelle la bdd
$db = Utils::connectDB();
$posts = [];

// bare de recherche  
$keywords = "";
if(isset($_GET["keywords"])){
    $keywords = $_GET["keywords"];
}

// on récupère les posts
if ($db){
    // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql = $db->query("SELECT * FROM post WHERE title LIKE '%".$keywords."%' or description LIKE '%".$keywords."%' ORDER BY id DESC");  
    // exécute la requete
    $sql->execute(); 
    // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete
    $posts = ($sql->fetchAll(PDO::FETCH_ASSOC));  
}

// on charge la vue
include "./views/base.phtml";
?>