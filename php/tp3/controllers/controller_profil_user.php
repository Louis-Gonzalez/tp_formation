<?php
// si oui alors afficher la page admin
// s'il y a le role_admin alors je fais le traitement
// on appelle la bdd
$db = Utils::connectDB();
$posts = [];

$id_to_show = (int)$_GET['id']; // on va récupérer l'id du user

// on récupère les users
if ($db){
    $sql = $db->query("SELECT * FROM user,contact WHERE user.id = $id_to_show and contact.user_id = $id_to_show");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $profil = ($sql->fetch(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 

}

include "./views/base.phtml";
?>

