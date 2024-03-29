<?php 
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin
if(!Utils::isRole("ROLE_ADMIN"))
{
    header("Location: ?page=home");
    exit;
}
// on recupère l'id
$post_id = (int)$_GET['id']; // j'ai ajouté "(int)" pour que ce soit un entier, on appelle ceci  "transtypé"
echo "Attention vous allez supprimer le post $post_id";

// on appelle la bdd
$db = Utils::connectDB();
$posts = [];

// on récupère les posts
if ($db){
    $sql = $db->query("DELETE FROM contact WHERE user_id = $post_id");
    $sql = $db->query("DELETE FROM comment WHERE user_id = $post_id"); // requete sql pour effacer la data de la table contact qui est enfant de la table user
    $sql = $db->query("DELETE FROM user WHERE id = $post_id");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    header("Location: ?page=admin_tab_user");
    exit;
}

?>