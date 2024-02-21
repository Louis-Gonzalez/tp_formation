<?php

// le role des controller sont là pour gérer la logique, gérer les autorisations, faire afficher les parties en fonctions de rôles une fois loger

// ma logique de controller
// ici on vérifie si le le champs de l'email et du mot de passe soit présent et non null
$isfinish = false;

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
    $message = htmlentities(strip_tags($_POST['message']));


    $password = password_hash($password, PASSWORD_DEFAULT); // password_hash fonction native de php qui prend en argument $password qui sera à traité et le deuxième argument est la méthode de hachage par defaut qui est évolutive

    $errors = []; // création d'un tableau de réception d'erreurs
    $exist = false;

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
        
            //echo "On peut ajouetr un utilisateur";
            // insertion dans la table user l'email et password 
            $sql = $db->prepare("INSERT INTO user (email, password) VALUES  
            (:email, :password)");
            // on lie les paramètres
            $sql->bindParam(':email', $email); 
            $sql->bindParam(':password', $password);
            // on exécute la requête
            $sql->execute();

            $user_id = $db->lastInsertId(); // on retourne le dernier "id" de l'utilisateur qui a été inseré dans la table user
            // echo $user_id; // on affiche l'id de l'utilisateur qui a été inseré dans la table user

            $sql = $db->prepare("INSERT INTO contact (firstname, lastname, address1, address2, zip, city, state, user_id, message) VALUES
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

            // si on arrive ici, c'est tout bon
            $isfinish = true;    // on affiche le message de confirmation de l'insertion dans la bdd
        }
}
//echo "<pre>"; 
// var_dump($_POST);
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