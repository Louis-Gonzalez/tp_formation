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
                header("Location: ?page=admin");
                die();
            }
            $errors[] = "Problème d'authentification !";
        
        }
        $template = './views/template_login.phtml';

        $this->render($template,['errors' => $errors]);
    }
    
    public function render($templatePath, $data){
        // Ouvrir la mémoire tampon du serveur
        // https://www.php.net/manual/en/function.ob-start.php
        ob_start();
        // Inclure le fichier de template
        include $templatePath;
        // On charge la mémoire tampon dans le template
        // https://www.php.net/manual/en/function.ob-get-clean.php
        $template = ob_get_clean();
        // Afficher le template avec les data entrées en param.Xrations et qui le chemin de "$template"
        include './views/base.phtml';
    }


}

?>