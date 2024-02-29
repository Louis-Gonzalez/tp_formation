<?php
// on appelle le models class Post qui est le module 
require_once('./models/Post.php');

$post = new Post();
// $posts recupère tous les $post avec la requête sql getAll, le 1er paramèttre nul pour la limite, et le 2eme paramètre est la rêquete sql
$posts = $post->getAll(null,"SELECT post.*, contact.firstname, contact.lastname FROM post, contact WHERE post.user_id=contact.user_id order by create_at desc");

// on charge la vue
include "./views/base.phtml";

?>