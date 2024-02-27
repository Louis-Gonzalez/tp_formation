<?php

// le role des controller sont là pour gérer la logique, gérer les autorisations, faire afficher les parties en fonctions de rôles une fois loger

// ma logique de controller
// on déconnecte l'utilisateur et supprime ses données de session
session_destroy();

// on redirige vers la home 
header("Location:?page=home");

//include "./views/base.phtml"; pas besoin de charge la vue en se déconnectant

?>