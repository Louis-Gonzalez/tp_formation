<?php
// aller chercher le role de l'user dans la base de donnée
// on vérifie le rôle n'existe pas  ou si l'utilisateur n'a pas le droit d'admin
if(!isset($_SESSION['user']['roles']) || !in_array('ROLE_MEMBER', json_decode($_SESSION['user']['roles']))){
    header("Location: ?page=home");
    exit;
}
// si oui alors afficher la page admin
// s'il y a le role_admin alors je fais le traitement
// on appelle la bdd
$db = Utils::connectDB();
$posts = [];
$isfinish = false;


// création de la fonction pour récuper l'extension et la remettre dans le fichier upload
function getExtension(){
    $temp = $_FILES['avatar']['name']; // on cible le fichier.extensionfichier
    $tabExtension = explode(".", $temp); // je le découpe par le séparateur point,
    // le deuxième paramètre est le fichier à découper
    return ".".$tabExtension[1]; // retourne le résultat pour l'utiliser dans $newfile
    /* on porrait ecrire = end($tabExtension) pour récuper le dernier index du tableau 
    au cas il y aurait plusieurs extension 
    j'ajoute manuellement le point et je concatene avec le .avant $tabExtension*/
};

// verification des extensions autorisées
function extensionAutorise(){
    global $extension1;
    global $extensionOk;
    $extensionAutorise = array(".png",".jpg",".jpeg",".gif");
    if (in_array($extension1, $extensionAutorise))
    {
        //echo "extensionValide", "ok";
        $extensionOk = true;
        //var_Utils::dump($extensionOk);
    }
    else
    {
        $errors[] = "extension invalide";
        //echo "extension invalide";
    }
    return $extensionOk;
};

// permet de vérifer si le fichier existe on cherche avatar dans $FILES
if (isset($_FILES['avatar'])){ 
    // si l'un des champs est vide soit null alors j'écris une erreur dans le tableau d'erreur
    // on verifie les valeurs champs
    //var_Utils::dump(($_FILES['avatar']['name']));

    // if (empty($_FILES['avatar']['name']));
    //     {
    //        $avatar = // on lui affete l'avatar par defaut
    //     }

    //var_Utils::dump($_FILES['avatar']);

    $extension1 = getExtension(); // assigne extension1 à la valeur retourner de la fonction getExtension
    //var_Utils::dump("nom de extension", $extension1);
    $extensionAccepte = extensionAutorise(); // assigne extensionAccepte à la valeur retourner de la fonction extensionAutorise
    $time = time();
    $newFile = "./assets/uploads/avatars/".$time.$extension1; // ici on écrit le chemin pour cibler le lieu du upload
    //var_Utils::dump($newFile);
    //var_Utils::dump($extensionAccepte);

    if ($extensionAccepte == true){ // on vérifie l'extension fichier si elle est autorisée 
        //var_Utils::dump("hehehe");

        if(empty($errors)){ // si le tableau d'eereur reste vide alors je fais l'upload
            echo "<h2>fichier uploadé</h2>";
            move_uploaded_file($_FILES['avatar']['tmp_name'],$newFile);
            
        }
    }
    else 
    { // double vérification via le tableau erreur
        $errors[] = "ce type de fichier n'est pas accepté";
        //var_Utils::dump("toto", $errors);
        //echo $errors;
    }
}

$id_to_update = (int)$_GET['id']; // on va récupérer l'id du user

// on récupère les users
if ($db){
    $sql = $db->query("SELECT * FROM user,contact WHERE user.id = $id_to_update and contact.user_id = $id_to_update");  // requete sql pour recupérer les data de la table post // query peut être remplacer par prepare
    $sql->execute(); // exécute la requete
    //echo "<pre>"; // permet de préformater le rendu visuel
    $post = ($sql->fetch(PDO::FETCH_ASSOC)); // on va chercher les datas de la requete // PDO::FETCH_ASSOC renvoie le tableau de requete 


    Utils::dump($post);

    // echo "<pre>";
    // var_Utils::dump($post) ;
    // echo "</pre>";

    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address1']) && isset($_POST['address2'])  && isset($_POST['zip']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['roles']) && isset($_POST['email']) && isset($_FILES['avatar'])
    
    
    && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['address1']) && !empty($_POST['address2']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['state'])  && !empty($_POST['roles']) && !empty($_POST['email']) ){ // il faut qu'il soit set et non vide

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $avatar = $time.$extension1;
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];
        $state = $_POST['state'];

        $roles[] = $_POST['roles'];
        if(!in_array('ROLE_MEMBER', $roles)){ // si le role n'est pas dans le tableau
            $roles[] = 'ROLE_MEMBER';  // on ajoute le role member
        }
        $roles = json_encode($roles); // sert encoder le tableau en chaine de caractères
        $email = $_POST['email'];

        unlink("assets/uploads/avatars/".$post['avatar']); // supprimer le fichier uplaodé

            $sql = $db->prepare("UPDATE user SET email = :email, avatar = :avatar, roles = :roles WHERE id = $id_to_update");   
            // on lie les paramètres
            $sql->bindParam(':email', $email);
            $sql->bindParam(':avatar', $avatar);
            $sql->bindParam(':roles', $roles); // ajout de l'id de l'utilisateur qui a ajoutée la card
            // on exécute la requête
            $sql->execute();

            echo "On peut ajouetr un utilisateur";
            // on ajoute la card à la bdd
            // on a jouté le user_id pour qu'il soit pris en compte par la bdd
    
            $user_id = $id_to_update; 
    
            $sql = $db->prepare("UPDATE contact SET user_id = :user_id, firstname = :firstname, lastname = :lastname, address1 = :address1, address2 = :address2, zip = :zip, city = :city, state = :state WHERE user_id = $id_to_update");
            // on lie les paramètres
            $sql->bindParam(':user_id', $user_id);
            $sql->bindParam(':firstname', $firstname);
            $sql->bindParam(':lastname', $lastname);
            $sql->bindParam(':address1', $address1);
            $sql->bindParam(':address2', $address2);
            $sql->bindParam(':zip', $zip);
            $sql->bindParam(':city', $city);
            $sql->bindParam(':state', $state);
            // on exécute la requête
            $sql->execute();
    
            // si on arrive ici, c'est tout bon
            $isfinish = true;    // on affiche le message de confirmation de l'insertion dans la bdd

        header("Location: ?page=admin_tab_user");
        exit;
    }

}

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

$roles = [
    "ROLE_MEMBER",
    "ROLE_ADMIN"
];

// si non rediriger vers la page d'accueil
// on charge la vue
include "./views/base.phtml";
?>