<?php

// On déclare l'espace de nom
namespace App\Controllers;

use App\Models\User;
use App\Services\Authenticator;

class LogoutController extends AbstractController
{

    // Déclaration de la fonction "index()"
    public function index() {

        $auth = new Authenticator();
        $auth->logout();
        header ('Location: ?page=home');
    }
}

?>