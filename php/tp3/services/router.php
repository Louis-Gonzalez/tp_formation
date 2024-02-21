<?php

// le la variable page est définie dans l'url
    // On la récupère sinon c'est "vide"

    $getPage = isset($_GET['page']) ? strtolower($_GET['page']) : "";
    // On definit le parcours pour charger le controller souhaité

    $path = "./controllers/controller_".$getPage.".php";
    // si le fichier n'existe pas le chemin n'est pas correct
    // on a parcours vers home qui evite d'afficher une erreur

    $page = file_exists($path) ? $getPage : "home";
    // On charge le controller souhaité avec un include ou un require

?>