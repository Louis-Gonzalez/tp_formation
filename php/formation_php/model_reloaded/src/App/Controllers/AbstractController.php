<?php

// On déclare l'espace de nom
namespace App\Controllers;

// On appelle les class
use App\Services\Authenticator;

// On déclare la class Controller
class AbstractController {

    // Déclaration de la fonction "render()"
    protected function render($templatePath, $data){ // protected sert à étendre la class render pour les classes enfants
        // Ouvrir la mémoire tampon du serveur
        // https://www.php.net/manual/en/function.ob-start.php
        ob_start();
        $auth = Authenticator::class;
        // Extrait les data entrées en paramètre
        // ce qui permettra de les utiliser dans le template directement $post dans le template
        extract($data);
        // Inclure le fichier de template
        include $templatePath;
        // On charge la.Xr©moire tampon dans le template
        // https://www.php.net/manual/en/function.ob-get-clean.php
        $template = ob_get_clean();
        // Afficher le template avec les data entrées en param.Xr©tre et qui le chemin de "$template"
        include './views/base.phtml';
    }
}


?>