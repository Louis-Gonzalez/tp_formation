<?php
/* Si la variable "avatar" arrive par le biai de la methode FILES
(formulaire validé)
On copie le fichier $ FILES['avatar'] dans le dossier "uploads"
*/

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

/*function verificationChamps(){
    global $verifChamp;
    $verifChamp = "les champs sont remplis";
    var_dump($_FILES['POST']['name']);
    if ($_POST['name'] != null
        && $_POST['mail'] != null
        && $_POST['pwd'] != null
        && $_FILES['avatar']['name'] != null)
    {
        echo "tototototo";
        return $verifChamp;
    }
}*/
// assigne la valeur retour de la fonction getExtension dans extension 1

// l'état de extension 


function extensionAutorise(){
    global $extension1;
    global $extensionOk;
    $extensionAutorise = array(".png",".jpg",".jpeg",".gif");
    if (in_array($extension1, $extensionAutorise))
    {
        echo "extensionValide", "ok";
        $extensionOk = true;
        var_dump($extensionOk);
    }
    else
    {
        echo "extension invalide";
    }
    return $extensionOk;
};

// die(); c'est une fonction spécial de PHP qui arrête l'éxécution du script à l'endroit posé


// permet de vérifer si le fichier existe on cherche avatar dans $FILES
if (isset($_FILES['avatar'])){ 
    // si l'un des champs est vide soit null alors j'écris une erreur dans le tableau d'erreur
    // on verifie les valeurs champs
    var_dump(($_POST['name']),($_POST['mail']),($_POST['pwd']),($_FILES['avatar']['name']));

    $errors = []; // création d'un tableau vide d'erreur

    if (empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['pwd']) || empty($_FILES['avatar']['name']))
        {
            $errors[] = "Tous les champs sont obligatoires merci !";
        }

    $extension1 = getExtension(); // assigne extension1 à la valeur retourner de la fonction getExtension
    var_dump("nom de extension", $extension1);
    $extensionAccepte = extensionAutorise(); // assigne extensionAccepte à la valeur retourner de la fonction extensionAutorise

    $newFile = "./uploads/".time().$extension1; // ici on écrit le chemin pour cibler le lieu du upload
    var_dump($newFile);
    var_dump($extensionAccepte);

    if ($extensionAccepte == true){ // on vérifie l'extension fichier si elle est autorisée 
        var_dump("hehehe");

        if(empty($errors)){ // si le tableau d'eereur reste vide alors je fais l'upload
            echo "<h2>fichier uploadé</h2>";
            move_uploaded_file($_FILES['avatar']['tmp_name'],$newFile);
        }
    }
    else 
    { // double vérification via le tableau erreur
        $errors[] = "ce type de fichier n'est pas accepté";
        var_dump("toto", $errors);
        echo $errors;
    }
}
echo "<pre>";
var_dump($GLOBALS);

/*
Fonction qui pourrait compter le nombre de visite sur un site. 

file_put_contents(
    string $filename,
    mixed $data,
    int $flags = 0,
    ?resource $context = null
): int|false
*/

?>
<!-- les majuscules pour POST sont importantes dans le nom de la méthode -->

<!-- l'attribut action sert à pointer la destination vers le fichier choisit -->

<!-- la méthode POST est une méthode obligatoire quand on traite des données sensibles-->

<!-- la méthode GET renoie les infos de saisie dans l'URL -->

<!-- la méthode enctype le formulaire est multiple, du texte et aussi de la data 
ceci va créer un fichier dans tmp dans xampp -->

<!--action="04_super_globals.php" autre méthode de redirection automatique via $_SERVER['PHP_SELF] -->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data"> 
    <label for="name">Name *</label>
    <input type="text" name="name" id="name">
    <label for="mail">Mail *</label>
    <input type="text" name="mail" id="mail">
    <label for="pwd">Password *</label>
    <input type="password" name="pwd" id="pwd">

<!-- le nom avatar ici, va nous servir à pointer le fichier ci-dessus
l'attribut accept permet à l'utilisateur de lui afficher seulement le type de fichier auquel
il a le endroit d'envoyer -->
    <input type="file" name="avatar" id="avatar" accept="image/png, image/jpg, image/jpeg">

    <input type="submit" value="envoyer">
</form>

