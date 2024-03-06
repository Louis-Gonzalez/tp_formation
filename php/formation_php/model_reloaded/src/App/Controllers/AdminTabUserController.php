<?php

// On déclare l'espace de nom
namespace App\Controllers;

// On appelle les classes
use App\Models\UserManager;
use App\Models\PostManager;
use App\Models\CommentManager;
use App\Models\ContactManager;
use App\Services\Utils;


// On déclare la class AdminTabUserController
class AdminTabUserController extends AbstractController
{
    public function index()
    {
        $manager = new UserManager();
        $users = $manager->getAll();
        $template = './views/template_admin_tab_user.phtml';
        $this->render($template, ['users' => $users]);
    }

    public function createUser()
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
            header ('Location: ?page=admintabuser');
        }
        //////////////////////////////////// TEMPLATING /////////////////////////////////////
        $template = './views/template_register.phtml';
        $this->render($template, [
                                    'isfinish' => $isfinish,
                                    'state' => $state,
                                    'errors' => $errors,
                                    'email' => $email
                                ]);
    }
    public function deleteUser()
    {
        // on récupère le id
        $user_id = (int) $_GET['id'];
        // on supprime les commentaires de l'utilisateur (comment enfant du post qui enfant user )
        $manager = new CommentManager(); 
        $deleteComments = $manager->deleteQuery(
                                                    "DELETE FROM comment 
                                                    WHERE user_id = ?", 
                                                    [$user_id]
                                                );
        // on supprime le post ensuite (post enfant de user)
        $manger = new PostManager();
        $deletePosts = $manger->deleteQuery(
                                                "DELETE FROM post
                                                WHERE user_id = ?",
                                                [$user_id]
                                            );
        // on supprime le contact (contact enfant de user)
        $manager = new ContactManager();
        $deleteContact = $manager->deleteQuery(
                                                    "DELETE FROM contact 
                                                    WHERE user_id = ?", 
                                                    [$user_id]
                                                );
        // on supprime le user 
        $manager = new UserManager();
        $id = $user_id;
        $delete = $manager->delete($id);
        header ('Location: ?page=admintabuser');
    }

    // On met à jour un utiliseur
    public function updateUser()
    {
        $state = [ // déclaration du tableau du menu déroulant state
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
        $roles = [ // déclaration du tableau du menu déroulant roles
            "ROLE_MEMBER",
            "ROLE_ADMIN"
        ];
        // on recupère le id de l'utilisateur
        $id = (int) $_GET['id'];
        $manager = new UserManager();
        $user = $manager->getAllBy(
                                    "SELECT * FROM user
                                    inner join contact
                                    on user.id = contact.user_id 
                                    WHERE user.id = " .   $id);
        var_dump($_POST);

        // on recupère les informations de l'utilisateur et on les vérifie
        if(isset($_POST['email']) && isset($_FILES['avatar']) && isset($_POST['roles']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['zip']) && isset($_POST['city']) && isset($_POST['state'])

        && !empty($_POST['email']) && !empty($_FILES['avatar']) && !empty($_POST['roles']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['address1']) && !empty($_POST['address2']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['state']))
        {
            $email = Utils::cleaner($_POST['email']);
            $avatar = $_FILES['avatar']['name']; // avatar = $_FILES
            $password = $user['password'];
            // gestion du role d'utilisateur
            $roles = [];
            $roles[] = Utils::cleaner($_POST['roles']);
            // si le role ADMIN est sélectionné alors on lui ajoute le role MEMBER
            if (in_array("ROLE_ADMIN", $roles)) {
                $roles[] = "ROLE_MEMBER";
            }
            $roles = json_encode($roles); // on transforme le tableau en chaine de caractères
            $firstname = Utils::cleaner($_POST['firstname']);
            $lastname = Utils::cleaner($_POST['lastname']);
            $address1 = Utils::cleaner($_POST['address1']);
            $address2 = Utils::cleaner($_POST['address2']);
            $zip = Utils::cleaner($_POST['zip']);
            $city = Utils::cleaner(strip_tags($_POST['city']));
            $state = Utils::cleaner(strip_tags($_POST['state']));
            $update_at = date('Y-m-d H:i:s');
            $user_id = $id;
            if ((!filter_var($email, FILTER_VALIDATE_EMAIL))){ // ici on utlise la fonctionne filter_var pour la vérification de l'émail
                $errors[] = "Veuillez rensigner une adresse email valide svp"; // message de débug si l'email n'est pas valide
            }
            $manager = new UserManager();
            $update = $manager->update( $id, [$email, $avatar, $password, $roles, $update_at]);
            $manager = new ContactManager();
            $update = $manager->updateQuery( "UPDATE contact
                                                SET firstname = ?, lastname = ?, address1 = ?, address2 = ?, zip = ?, city = ?, state = ?, update_at = ?
                                                WHERE user_id = ?", [$firstname, $lastname, $address1, $address2, $zip, $city, $state, $update_at, $user_id]);
            header('Location: ?page=admintabuser');
        }
        
        $template = './views/template_admin_update_user.phtml';
        $this->render($template,[
                                    'user' => $user,
                                    'state' => $state,
                                    'roles' => $roles
                                ]);
    }
    public function search()
    {
        $keywords = $_GET['keywords'];
        $manager = new UserManager();
        $users = $manager->getAll(
            null, " SELECT * FROM user 
                    inner join contact
                    on user.id = contact.user_id
                    WHERE email LIKE '%".$keywords."%'
                    OR firstname LIKE '%".$keywords."%'
                    OR lastname LIKE '%".$keywords."%'
                    ORDER BY user.id desc"
        );
        $template = './views/template_admin_tab_user.phtml';
        $this->render($template, ['users' => $users]);
    } 

}

?>