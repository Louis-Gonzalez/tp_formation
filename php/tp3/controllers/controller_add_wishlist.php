<?php
if(!Utils::isRole("ROLE_MEMBER"))
{
    header("Location: ?page=home");
    exit;
}
// on charge les card seulement si elles ont cohées dans checkbox wishlist
// on récupère la list des posts
// on appelle la bdd
$db = Utils::connectDB();
$posts = [];

// bare de recherche  
$keywords = "";
if(isset($_GET["keywords"])){
    $keywords = $_GET["keywords"];
}

function addWishList(<?= $article['id']?>){




}

// on récupère les posts
// if ($db){
//     // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
//     $sql = $db->query("SELECT * FROM post WHERE title LIKE '%".$keywords."%' or description LIKE '%".$keywords."%' ORDER BY id DESC");  
//     // exécute la requete
//     $sql->execute(); 
//     // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete
//     $posts = ($sql->fetchAll(PDO::FETCH_ASSOC));  
// }


// on la fonction 
if (isset($_POST['add-wishlist'])) {  
}

// on affiche les cards dans le template add_wishlist.phtml



// on charge la vue
include "./views/base.phtml";
?>