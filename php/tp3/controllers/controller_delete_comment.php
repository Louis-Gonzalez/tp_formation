<?php

// on vérifie le rôle 
if(!Utils::isRole("ROLE_ADMIN") && $_GET['comment_id'] != $_SESSION['user']['id'])
{
    header("Location: ?page=home");
    exit;
}

// on appelle la bdd
$db = Utils::connectDB();
$comments = [];

// on recupère l'id
$post_id = (int)$_GET['id'];

// on va récupérer l'id commentaire
$comment_id_to_delete = (int)$_GET['comment_id']; 
echo "Attention vous allez supprimer le post $comment_id_to_delete";

if ($db){
    // requete sql pour recupérer les data de la table comment
    $sql = $db->query("DELETE FROM comment WHERE id = $comment_id_to_delete");  
    // exécute la requete
    $sql->execute(); 
    // redirection vers
    header("Location: ?page=details_card&id=$post_id");
    exit;
}

?>