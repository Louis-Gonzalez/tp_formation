<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin
if(!Utils::isRole("ROLE_ADMIN"))
{
    header("Location: ?page=home");
    exit;
}
// vérifer si l'utilisateur à le droit admin
// ma logique de controller
$db = Utils::connectDB();
$posts = [];

// bare de recherche
$keywords = "";
if(isset($_GET["keywords"])){
    $keywords = $_GET["keywords"];
}

// on récupère les users
if ($db){
    // requete sql pour recupérer les data de la table user
    $sql = $db->query("SELECT * FROM user WHERE email LIKE '%".$keywords."%' ORDER BY id DESC");
    // exécute la requete
    $sql->execute();
    // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete
    $posts = ($sql->fetchAll(PDO::FETCH_ASSOC));  
    //var_Utils::dump($posts);
}

// on charge la vue
include "./views/base.phtml";
?>