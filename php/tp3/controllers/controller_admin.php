<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin
if(!isRole("ROLE_ADMIN"))
{
    header("Location: ?page=home");
    exit;
}


// vérifer si l'utilisateur à le droit admin


// si oui alors afficher la page admin


// si non rediriger vers la page d'accueil
// on charge la vue
include "./views/base.phtml";
?>