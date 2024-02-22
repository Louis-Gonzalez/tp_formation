<?php

// le role des controller sont là pour gérer la logique, gérer les autorisations, faire afficher les parties en fonctions de rôles une fois loger

// ma logique de controller
$db = connectDB();
$keywords = strip_tags(urldecode(trim($_GET['keywords']))); // "trim" sert à enlever les espaces avant après lekeywords "urlcode" sert à décoder les caractères spéciaux
// et strip_tags sert à enlever toutes balises tags <....>

$posts = [];

if ($db){
    // double cotes :  on commence par les doubles cotes donc avant d'ajouter la concaténation .$keywords. on doit fermer les doubles cotes et après .$keywords. ont les réouvres
    $sql = $db->query("SELECT * FROM post WHERE title LIKE '%".$keywords."%'  
                        OR description LIKE '%".$keywords."%' OR image LIKE '%".$keywords."%' ORDER BY id");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $posts = ($sql->fetchAll(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 
    //var_dump($posts);
}
// bla bla bla
// on charge la vue
include "./views/base.phtml";

?>
