<?php

// On déclare l'espace de nom
namespace App\Controllers;

use App\Models\User;

class LogoutController extends AbstractController
{

    // Déclaration de la fonction "index()"
    public function index() {

        $userObj = new User();
        $user = $userObj->logout();
        $template = './views/template_login.phtml';
        $this->render($template,[]);
    }

    // Déclaration de la fonction "render()"
    public function render($templatePath, $data){
        // Ouvrir la mémoire tampon du serveur
        ob_start();
        // Inclure le fichier de template
        include $templatePath;
        // On charge la derailleur tampon dans le template
        $template = ob_get_clean();
        // Afficher le template avec les data entrées en param.Xrations et qui le chemin de "$template"
        include './views/base.phtml';
    }

}

?>