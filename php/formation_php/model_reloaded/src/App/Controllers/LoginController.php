<?php
// on déclare l'espace de nom
namespace App\Controllers;

// on utilise la class
// use App\Models\User;
// use App\Models\UserManager;
use App\Services\Authenticator;

class LoginController extends AbstractController
{
    // Déclaration e la fonction index()
    public function index(){
        $errors =[];
        //var_dump('tottoootto');
        if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
            // verification de le password , s'il vient du champs du formulaire password
            $password = htmlentities(strip_tags($_POST['password'])); // on sucurise le champs
            // verification de l'email , s'il vient du champs du formulaire email
            $email = htmlentities(strip_tags($_POST['email'])); // on sécurise le champs
            $auth = new Authenticator();
            if($auth->login($email,$password)){

                if(isset($_POST['remember_me'])){
                    // ceci permet de transformer un tableau en chaine de caractères et son inverse "unserialize" chaine -> tableau
                    $cookieData = serialize($_SESSION['user']); 
                    setcookie(CONFIG_COOKIE_NAME,$cookieData, time()+3600);
                }
                header("Location: ?page=home");
                die();
            }
            $errors[] = "Problème d'authentification !";
        }
        $template = './views/template_login.phtml';
        $this->render($template, ['errors' => $errors]);
    }



}

?>