<?php

// le role des controller sont là pour gérer la logique, gérer les autorisations, faire afficher les parties en fonctions de rôles une fois loger

// ma logique de controller
require_once('./models/Post.php');

$post = new Post();
$posts = $post->getAll(null,"SELECT post.*, contact.firstname, contact.lastname FROM post, contact WHERE post.user_id=contact.user_id order by create_at desc");

header("Content-Type: application/json");
echo json_encode($posts);

// ici on n'a pas besoin de charger la vue car on renvoit directement un objet json qui sera lu par le navigateur
?>