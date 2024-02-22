<?php

// le role des controller sont là pour gérer la logique, gérer les autorisations, faire afficher les parties en fonctions de rôles une fois loger

// ma logique de controller
// ici on vérifie si le le champs de l'email et du mot de passe soit présent et non null

$errors = []; // création d'un tableau de réception d'erreurs
$exist = false;

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
    var_dump(($_FILES['avatar']['name']));

    // if (empty($_FILES['avatar']['name']))
    //     {
    //        // $avatar = // on lui affete l'avatar par defaut
    //     }

    $extension1 = getExtension(); // assigne extension1 à la valeur retourner de la fonction getExtension
    //var_dump("nom de extension", $extension1);
    $extensionAccepte = extensionAutorise(); // assigne extensionAccepte à la valeur retourner de la fonction extensionAutorise

    $newFile = "./assets/uploads/avatars/".time().$extension1; // ici on écrit le chemin pour cibler le lieu du upload
    //var_dump($newFile);
    //var_dump($extensionAccepte);

    if ($extensionAccepte == true){ // on vérifie l'extension fichier si elle est autorisée 
        //var_dump("hehehe");

        if(empty($errors)){ // si le tableau d'eereur reste vide alors je fais l'upload
            //echo "<h2>fichier uploadé</h2>";
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

if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname']))
{
    $email = htmlentities(strip_tags($_POST['email'])); // ceci va nettoyer le code de tout les symboles pour garder que les alphanumériques   // https://www.php.net/manual/fr/function.htmlentities.php
    $password = htmlentities(strip_tags($_POST['password']));
    $firstname = htmlentities(strip_tags($_POST['firstname']));
    $lastname = htmlentities(strip_tags($_POST['lastname']));
    $address1 = htmlentities(strip_tags($_POST['address1']));
    $address2 = htmlentities(strip_tags($_POST['address2']));
    $zip = htmlentities(strip_tags($_POST['zip']));
    $city = htmlentities(strip_tags($_POST['city']));
    $state = htmlentities(strip_tags($_POST['state']));
    //$avatar = ;
    $message = htmlentities(strip_tags($_POST['message']));


    $password = password_hash($password, PASSWORD_DEFAULT); // password_hash fonction native de php qui prend en argument $password qui sera à traité et le deuxième argument est la méthode de hachage par defaut qui est évolutive


    if ((!filter_var($email, FILTER_VALIDATE_EMAIL))){ // ici on utlise la fonctionne filter_var pour la vérification de l'émail

        $errors[] = "Veuillez rensigner une adresse email valide svp"; // message de débug si l'email n'est pas valide
    }
    // on verifie si l'email existe dejà dans la base de donnée
    $db = connectDB(); // on se connecte à la bdd
    $query = $db->prepare("SELECT email FROM user WHERE email=:email"); // requete sql
    $query ->bindParam(':email',$email); // sert à protéger les injections sql "bindParam"
    $query ->execute(); // on exécute de la requête
    $exist = $query ->fetchColumn(); // retourne qu'un seul élément

    if ($exist){
            $errors[] = "Cet utilisateur existe déjà dans la base donnée.";
        }
        //var_dump($errors); // on affiche le tableau d'erreurs

    if (empty($errors)){ // si le tableau d'erreurs restent vide alors on peut créer l'user
            echo "On peut ajouetr un utilisateur";
            // insertion dans la table user l'email et password 
            $sql = $db->prepare("INSERT INTO user (email, password, avatar) VALUES  
            (:email, :password, :avatar)");
            // on lie les paramètres
            $sql->bindParam(':email', $email); 
            $sql->bindParam(':password', $password);
            $sql->bindParam(':avatar', $avatar);
            // on exécute la requête
            $sql->execute();

            $user_id = $db->lastInsertId(); // on retourne le dernier "id" de l'utilisateur qui a été inseré dans la table user
            echo $user_id; // on affiche l'id de l'utilisateur qui a été inseré dans la table user

            $sql = $db->prepare("INSERT INTO contact (firstname, lastname, address1, address2, zip, city, state, avatar, user_id, message) VALUES
            (:firstname, :lastname, :adress1, :adress2, :zip, :city, :state, :user_id, :message)");
            // on lie les paramètres
            $sql->bindParam(':firstname', $firstname);
            $sql->bindParam(':lastname', $lastname);
            $sql->bindParam(':adress1', $address1);
            $sql->bindParam(':adress2', $address2);
            $sql->bindParam(':zip', $zip);
            $sql->bindParam(':city', $city);
            $sql->bindParam(':state', $state);
            $sql->bindParam(':user_id', $user_id);
            $sql->bindParam(':message', $message);
            // on exécute la requête
            $sql->execute();
        }
}
//echo "<pre>"; 
//var_dump($_POST);
// bla bla bla
// on charge la vue

$state = [ // déclaration du tableau du menu déroulant
        "Auvergne-Rhône-Alpes",
        "Bourgogne-Franche-Comté",
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
        "Provence Alpes Côte d’Azur",
        "Guadeloupe",
        "Guyane",
        "Martinique",
        "Mayotte",
        "Réunion"
];

include "./views/base.phtml";

?>

