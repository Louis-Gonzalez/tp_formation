<?php

// on appelle la bdd
$db = connectDB();
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
        //var_dump($extensionOk);
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
    //var_dump(($_FILES['avatar']['name']));

    // if (empty($_FILES['avatar']['name']));
    //     {
    //        $avatar = // on lui affete l'avatar par defaut
    //     }

    //var_dump($_FILES['avatar']);

    $extension1 = getExtension(); // assigne extension1 à la valeur retourner de la fonction getExtension
    //var_dump("nom de extension", $extension1);
    $extensionAccepte = extensionAutorise(); // assigne extensionAccepte à la valeur retourner de la fonction extensionAutorise
    $time = time();
    $newFile = "./assets/uploads/avatars/".$time.$extension1; // ici on écrit le chemin pour cibler le lieu du upload
    //var_dump($newFile);
    //var_dump($extensionAccepte);

    if ($extensionAccepte == true){ // on vérifie l'extension fichier si elle est autorisée 
        //var_dump("hehehe");

        if(empty($errors)){ // si le tableau d'eereur reste vide alors je fais l'upload
            echo "<h2>fichier uploadé</h2>";
            move_uploaded_file($_FILES['avatar']['tmp_name'],$newFile);
        }
    }
    else 
    { // double vérification via le tableau erreur
        $errors[] = "ce type de fichier n'est pas accepté";
        //var_dump("toto", $errors);
        //echo $errors;
    }
}

if(
    isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['zip']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['email']) && isset($_POST['password'])

    && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['address1']) && !empty($_POST['address2']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['email']) && !empty($_POST['password']))
{
    var_dump("entrée dans la condition");

    $email = htmlentities(strip_tags($_POST['email'])); // ceci va nettoyer le code de tout les symboles pour garder que les alphanumériques
    $avatar = $time.$extension1;
    $password = htmlentities(strip_tags($_POST['password']));
    $firstname = htmlentities(strip_tags($_POST['firstname']));
    $lastname = htmlentities(strip_tags($_POST['lastname']));
    $address1 = htmlentities(strip_tags($_POST['address1']));
    $address2 = htmlentities(strip_tags($_POST['address2']));
    $zip = htmlentities(strip_tags($_POST['zip']));
    $city = htmlentities(strip_tags($_POST['city']));
    $state = htmlentities(strip_tags($_POST['state']));

    $password = password_hash($password, PASSWORD_DEFAULT); // password_hash fonction native de php qui prend en argument $password qui sera à traité et le deuxième argument est la méthode de hachage par defaut qui est évolutive

    $errors = []; // création d'un tableau de réception d'erreurs
    $exist = false;

    if ((!filter_var($email, FILTER_VALIDATE_EMAIL))){ // ici on utlise la fonctionne filter_var pour la vérification de l'émail
        $errors[] = "Veuillez rensigner une adresse email valide svp"; // message de débug si l'email n'est pas valide
    }

    $roles = '["ROLE_MEMBER"]'; // ON AFFECTE LE ROLE MEMBER PAR DEFAUT AU USER
    //$avatar = './asstes/uplaods/avatars/avatrdefault.png';

    if (empty($errors)){ // si le tableau d'erreurs restent vide alors on peut créer l'user
        
        echo "On peut ajouetr un utilisateur";
        // on ajoute la card à la bdd
        // on a jouté le user_id pour qu'il soit pris en compte par la bdd
        $sql = $db->prepare("INSERT INTO user (email, avatar, password, roles) VALUES 
        (:email, :avatar, :password, :roles)");   
        // on lie les paramètres
        $sql->bindParam(':email', $email);
        $sql->bindParam(':avatar', $avatar);
        $sql->bindParam(':password', $password);
        $sql->bindParam(':roles', $roles); // ajout de l'id de l'utilisateur qui a ajoutée la card
        // on exécute la requête
        $sql->execute();

        $user_id = $db->lastInsertId(); // on retourne le dernier "id" de l'utilisateur qui a été inseré dans la table user
        // echo $user_id; // on affiche l'id de l'utilisateur qui a été inseré dans la table user

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
        $isfinish = true;    // on affiche le message de confirmation de l'insertion dans la bdd
    }
    // redirection après ajout de la card
    header("Location: ?page=home");
    exit;
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

// si non rediriger vers la page d'accueil
// on charge la vue
include "./views/base.phtml";
?>

