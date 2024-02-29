<?php

// le role des controller sont là pour gérer la logique, gérer les autorisations, faire afficher les parties en fonctions de rôles une fois loger
// echo "<pre>"; 
// var_Utils::dump($_POST);
// echo "</pre>";

// ma logique de controller

$isfinish = false;

// on vérifie si les champs proviennent de la page contact et s'ils sont pas vide
if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){

    // verification de le password , s'il vient du champs du formulaire password
    $password = htmlentities(strip_tags($_POST['password'])); // on sucurise le champs

    // verification de l'email , s'il vient du champs du formulaire email
    $email = htmlentities(strip_tags($_POST['email'])); // on sécurise le champs

    // on se connecte à la bdd et on verifie si l'email existe dans la bdd et on le récupère
    $db = Utils::connectDB();
    $query = $db->prepare("SELECT user.*, contact.firstname ,contact.lastname FROM user, contact WHERE email=:email AND user.id = contact.user_id  LIMIT 1" ); // requete sql
    $query ->bindParam(':email',$email); // sert à protéger les injections sql "bindParam"
    $query ->execute(); // on exécute de la requête
    $user = $query ->fetch(PDO::FETCH_ASSOC); // retourne tout les éléments lié à l'email dans la table "user" 
    
    $db_hash = $user['password']; // on récupère le mot de passe dans la bdd
    //var_Utils::dump($user['password']);

    $errors = []; // création d'un tableau de réception d'erreurs

    if (!$user['email']){ // on vérifie si l'email n'existe pas dans la bdd
        $errors[] = "Soit l'email, soit le mot de passe ne sont pas corrects";
    }

    if (empty($errors)){ // si le tableau d'erreurs est vide on peut continuer le process

        // on vérifie si $user est un tableau et que le mot de passe correspond
        if (is_array($user)){
            //var_Utils::dump($user);
            $db_hash = $user['password'];
            if (password_verify($password, $db_hash)){
                //echo "good password";
                unset($user['password']); // j'enlève le mot de passe 
                $_SESSION['user'] = $user;
                header("Location:?page=home"); // redirection vers la page home si la connexion à réussi
            }
            else {
                //echo "invalid password";
                $errors[] = "Soit l'email, soit le mot de passe ne sont pas corrects";
            }
        }
        $isfinish = true;
    }
    // var_Utils::dump($errors);
    // var_Utils::dump($isfinish);
}
// bla bla bla

// on charge la vue
include "./views/base.phtml";

?>