<?php
    session_start();
    echo "<pre>";

    //session_status(); // on verifie si la session est ouverte
    //session_destroy(); // on detruit les information de la session et supprime "phpsessid"
    //session_abort(); // on annule la session, on ferme et ne supprime pas "phpsessid"
    //session_unset(); // on garde la session ouverte et on supprime les valeurs de la session, mais on garde le "phpseessid"

    var_dump($_SESSION); // il récupère les informations de session de l'index.php
    //echo session_id(); // on affiche "phpsessid" de la session
    echo session_encode(); // on affiche le contenu de la session

    // au niveau RPD, on doit pouvoir fournir la liste des gens qui ont acceptés ou refusés les cookies et les liés à l'IP de l'utilisateur et doit le garder pendant un mois au maximum
?>