<?php
// on vérifie le rôle 
if(!Utils::isRole("ROLE_ADMIN"))
{
    header("Location: ?page=home");
    exit;
}

// on appelle la bdd
$db = Utils::connectDB();
$posts = [];
$isfinish = false;

// création de la fonction pour récuper l'extension et la mettre dans le fichier upload
function getExtension(){
    // on cible le fichier.extensionfichier
    $temp = $_FILES['avatar']['name']; 
    // je le découpe par le séparateur point,
    $tabExtension = explode(".", $temp);    
    // le deuxième paramètre est le fichier à découper
    return ".".$tabExtension[1]; 
    /* retourne le résultat pour l'utiliser dans $newfile
    on porrait ecrire = end($tabExtension) pour récuper le dernier index du tableau 
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
    // on verifie les valeurs champs //var_Utils::dump(($_FILES['avatar']['name']));
    // if (empty($_FILES['avatar']['name']));
    //     {
    //        $avatar = // on lui affete l'avatar par defaut
    //     }
    //var_Utils::dump($_FILES['avatar']);

    // assigne extension1 à la valeur retourner de la fonction getExtension
    $extension1 = getExtension();   
    //var_Utils::dump("nom de extension", $extension1);
    // assigne extensionAccepte à la valeur retourner de la fonction extensionAutorise
    $extensionAccepte = extensionAutorise(); 
    $time = time();
    // ici on écrit le chemin pour cibler le lieu du upload
    $newFile = "./assets/uploads/avatars/".$time.$extension1; 
    //var_Utils::dump($newFile);
    //var_Utils::dump($extensionAccepte);

    // on vérifie l'extension fichier si elle est autorisée 
    if ($extensionAccepte == true){ 
        //var_Utils::dump("hehehe");
        // si le tableau d'erreur reste vide alors je fais l'upload
        if(empty($errors)){     
            //echo "<h2>fichier uploadé</h2>";
            move_uploaded_file($_FILES['avatar']['tmp_name'],$newFile);
        }
    }
    else {   
        // vérification via le tableau erreur
        $errors[] = "ce type de fichier n'est pas accepté";
        //var_Utils::dump("toto", $errors);
        //echo $errors;
    }
}

// Vérification conditionnelle des champs inputs du formulaires "admin_create_user.phtml"
if(
    isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['zip']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['email']) && isset($_POST['password'])

    && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['address1']) && !empty($_POST['address2']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['email']) && !empty($_POST['password']))

{   //var_Utils::dump("entrée dans la condition");
    
    // ceci va nettoyer le code de tout les symboles pour garder que les alphanumériques
    $email = htmlentities(strip_tags($_POST['email'])); 
    $avatar = $time.$extension1;
    $password = htmlentities(strip_tags($_POST['password']));
    $firstname = htmlentities(strip_tags($_POST['firstname']));
    $lastname = htmlentities(strip_tags($_POST['lastname']));
    $address1 = htmlentities(strip_tags($_POST['address1']));
    $address2 = htmlentities(strip_tags($_POST['address2']));
    $zip = htmlentities(strip_tags($_POST['zip']));
    $city = htmlentities(strip_tags($_POST['city']));
    $state = htmlentities(strip_tags($_POST['state']));

    // password_hash fonction native de php qui prend en argument $password qui sera à traité et le deuxième argument est la méthode de hachage par defaut qui est évolutive
    $password = password_hash($password, PASSWORD_DEFAULT); 

    // création d'un tableau de réception d'erreurs
    $errors = []; 
    $exist = false;

    // ici on utlise la fonctionne filter_var pour la vérification de l'émail
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL))){ 
        // message de débug si l'email n'est pas valide
        $errors[] = "Veuillez rensigner une adresse email valide svp"; 
    }
    // ON AFFECTE LE ROLE MEMBER PAR DEFAUT AU USER
    $roles = '["ROLE_MEMBER"]'; 

    // si le tableau d'erreurs restent vide alors on peut créer l'user
    if (empty($errors)){    
        // on vérifie si l'user peut-être ajouter
        echo "On peut ajouetr un utilisateur";
        // on ajoute la card à la bdd
        // on a jouté le user_id pour qu'il soit pris en compte par la bdd
        $sql = $db->prepare("INSERT INTO user (email, avatar, password, roles) VALUES 
        (:email, :avatar, :password, :roles)");   
        // on lie les paramètres
        $sql->bindParam(':email', $email);
        $sql->bindParam(':avatar', $avatar);
        $sql->bindParam(':password', $password);
        $sql->bindParam(':roles', $roles);
        // on exécute la requête
        $sql->execute();

        // on retourne le dernier "id" de l'utilisateur qui a été inseré dans la table user
        // echo $user_id; // on affiche l'id de l'utilisateur qui a été inseré dans la table user
        $user_id = $db->lastInsertId(); 

        // on ajoute les infos contact à la bdd
        $sql = $db->prepare("INSERT INTO contact (user_id, firstname, lastname, address1, address2, zip, city, state) VALUES
        (:user_id, :firstname, :lastname, :adress1, :adress2, :zip, :city, :state)");
        // on lie les paramètres
        $sql->bindParam(':user_id', $user_id);
        $sql->bindParam(':firstname', $firstname);
        $sql->bindParam(':lastname', $lastname);
        $sql->bindParam(':adress1', $address1);
        $sql->bindParam(':adress2', $address2);
        $sql->bindParam(':zip', $zip);
        $sql->bindParam(':city', $city);
        $sql->bindParam(':state', $state);
        // on exécute la requête
        $sql->execute();

        // si on arrive ici, c'est tout bon
        // on affiche le message de confirmation de l'insertion dans la bdd
        $isfinish = true;    
    }
    // redirection après ajout de la card
    header("Location: ?page=admin_tab_user");
    exit;
}

// déclaration du tableau du menu déroulant Attention, le menu déroulant ne peut rendre de value avec des accents
$state = [ 
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

// on charge la vue
include "./views/base.phtml";
?>

