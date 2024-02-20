<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon site modulaire</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./index.css" rel="stylesheet">
        <style>

        </style>
        <link href="../css_tp1/index.css" rel="stylesheet" />
    </head>
    <body>
        <?php
        require("./header.php");
        ?>
    <main class="container-fluid">
        <?php
        // isset corresponda s'il y la variable est définis et différentes de null 
        // si la variable est définis dans l'url on l'a récupère sinon c'est "home"

        $getPage = isset($_GET['page']) ? $_GET['page'] : "home";
        // ici on définis le parcours de la page souhaitée

        $path = "./pages/" .$getPage.".php";

        // si le fichier n'existe pas alors le chemin du fichier n'existe pas
        // On verifie si le fichier existe par son chemin et oui, 
        //on l'affiche ou non on retourne sur la page home
        $page = file_exists($path) ? $path : "./pages/home.php";
        // On charge la page souhaitée avec un include ou un require
        include($page);
        ?>
    </main>
        <?php
        require("./footer.php");
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
