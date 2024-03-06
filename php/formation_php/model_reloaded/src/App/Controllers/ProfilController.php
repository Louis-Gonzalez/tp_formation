<?php 

// On déclare l'espace de nom
namespace App\Controllers;

// On appelle les classes
use App\Models\UserManager;
use App\Models\ContactManager;

// On déclare la class ProfilController

class ProfilController extends AbstractController
{
    
    public function index()
    {
        $id= $_SESSION['user']['id']; 
        $manager = new ContactManager();
        $contact= $manager -> getAllBy("SELECT * FROM contact
                                        inner join user
                                        on contact.user_id = user.id  
                                        WHERE user_id = $id");

        $template = './views/template_profil.phtml';
        $this->render($template, ['contact' => $contact]);
    }
    
    public function showProfil(){

        $id = $_GET['id'];
        $manager = new ContactManager();
        $contact= $manager -> getAllBy("SELECT * FROM contact
                                        inner join user
                                        on contact.user_id = user.id  
                                        WHERE user_id = $id");
        $template = './views/template_profil.phtml';
        $this->render($template, ['contact' => $contact]);
    }
    
    public function deleteProfil(){

        $id = $_GET['id'];
        $manager = new ContactManager();
        $contact= $manager -> getAllBy("SELECT * FROM contact
                                        inner join user
                                        on contact.user_id = user.id  
                                        WHERE user_id = $id");
        $this->render(null, ['contact' => $contact]);
    }
}

?>