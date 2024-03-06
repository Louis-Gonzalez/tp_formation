<?php 

// On déclare l'espace de nom
namespace App\Controllers;

// On appelle les class
use App\Models\UserManager;
// use App\Models\User;
// use App\Services\Authenticator;
use App\Models\ContactManager;
// use App\Services\Contact;
use App\Controllers\AbstractController;
use App\Services\Utils;

// On déclare la class ContactController

class ContactController extends AbstractController
{
    // Déclaration e la fonction index()
    public function index()
        {
            $errors = [];
            $isfinish = false;
            $email = "";
            $avatar = "1709106123.png";
            $update_at = date("Y-m-d H:i:s");
            $state = [ // déclaration du tableau du menu déroulant
                "Auvergne-Rhone-Alpes",
                "Bourgogne-Franche-Comte",
                "Bretagne",
                "Centre-Val de Loire",
                "Corse",
                "Grand Est",
                "Hauts-de-France",
                "Ile-de-France",
                "Normandie",
                "Nouvelle-Aquitaine",
                "Occitanie",
                "Pays de la Loire",
                "Provence Alpes Cote d Azur",
                "Guadeloupe",
                "Guyane",
                "Martinique",
                "Mayotte",
                "Reunion"
            ];
            $title = "This page is Contact !";

            ///////////////////////////////////// LOGIQUE ///////////////////////////////////////

            if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname']))
            {
                $email = Utils::cleaner($_POST['email']);
                $password = Utils::cleaner($_POST['password']);
                $firstname = Utils::cleaner($_POST['firstname']);
                $lastname = Utils::cleaner($_POST['lastname']);
                $address1 = Utils::cleaner($_POST['address1']);
                $address2 = Utils::cleaner($_POST['address2']);
                $zip = Utils::cleaner($_POST['zip']);
                $city = Utils::cleaner(strip_tags($_POST['city']));
                $state = Utils::cleaner(strip_tags($_POST['state']));
                $message = Utils::cleaner(strip_tags($_POST['message']));

                // password_hash fonction native de php qui prend en argument $password qui sera à traité et le deuxième argument est la méthode de hachage par defaut qui est évolutive
                $password = password_hash($password, PASSWORD_DEFAULT); 

                $errors = []; // création d'un tableau de réception d'erreurs
                $exist = false;

                if ((!filter_var($email, FILTER_VALIDATE_EMAIL))){ // ici on utlise la fonctionne filter_var pour la vérification de l'émail
                    $errors[] = "Veuillez rensigner une adresse email valide svp"; // message de débug si l'email n'est pas valide
                }
                // On vérifie si l'email existe dans le bdd user
                $userManager = new UserManager();
                $exits = $userManager->getUserByEmail($email);
                // Si l'email existe dans le bdd user on affiche un message d'erreur
                if ($exist){
                        $errors[] = "Cet utilisateur existe déjà dans la base donnée.";
                    }
                    //var_Utils::dump($errors); // on affiche le tableau d'erreurs

                if (empty($errors)){ // si le tableau d'erreurs restent vide alors on peut créer l'user
                    
                    // insertion dans la table user l'email et password 
                    $insertUser = $userManager->insert([$email, $avatar ,$password, "['ROLE_MEMBER']",$update_at]);
                    $user_id = $insertUser->lastInsertId(); // on retourne le dernier "id" de l'utilisateur qui a été inseré dans la table user
                    // echo $user_id; // on affiche l'id de l'utilisateur qui a été inseré dans la table user
                    $contactManager = new ContactManager();
                    $insertContact = $contactManager->insert([
                                                                $user_id,
                                                                $lastname, 
                                                                $firstname,
                                                                $address1, 
                                                                $address2, 
                                                                $zip, 
                                                                $city, 
                                                                $state, 
                                                                $message,
                                                                $update_at
                                                            ]);
                    // si on arrive ici, c'est tout bon
                    // on affiche le message de confirmation de l'insertion dans la bdd
                    $isfinish = true;
                }
            }
            //////////////////////////////////// TEMPLATING /////////////////////////////////////
            $template = './views/template_contact.phtml';
            $this->render($template, [
                                        'isfinish' => $isfinish,
                                        'state' => $state,
                                        'errors' => $errors,
                                        'email' => $email
                                    ]);
        }
}


?>