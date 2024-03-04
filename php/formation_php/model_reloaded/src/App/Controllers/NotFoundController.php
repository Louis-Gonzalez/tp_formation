<?php

// on déclare l'espace de nom
namespace App\Controllers;

// on déclare la class NotFoundController
class NotFoundController extends AbstractController
{
    // déclaration de la fonction "index()"
    public function index(){
        
        $title = "Not Found";
        $template = './views/template_notfound.phtml';

        $this->render($template, [
            'title' => $title
        ]);
    }
}


?>