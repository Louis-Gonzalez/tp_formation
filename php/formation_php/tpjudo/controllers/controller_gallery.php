<?php

// le role des controller sont là pour gérer la logique, gérer les autorisations, faire afficher les parties en fonctions de rôles une fois loger

// ma logique de controller
$db = connectDB();
$posts = [];

if ($db){
    $sql = $db->query("SELECT * FROM post ORDER BY id");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $posts = ($sql->fetchAll(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 
    //var_dump($posts);
}

// bla bla bla
// on charge la vue
include "./views/base.phtml";

?>