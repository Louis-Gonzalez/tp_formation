<?php
    $resultat = "";

    $tableauChoix = ["ciseaux","pierre","feuille"];
    $random = rand(0,2); 
    /*var_dump($random); // ok la fonction random fonctionne

    var_dump($GLOBALS);
    echo "<br>";
    echo "<br>";*/

    $choixIa = $tableauChoix[$random]; // random aléatoire
    /*var_dump("choix de IA",$choixIa); // verification de la valeur via l'index aléatoire
    echo "<br>";
    echo "<br>";*/

    $choixPlayer = $_POST['choix']; // choix qui vient du menu déroulant
    $gagner = "Vous avez à gagner";
    $egalite = "Egalité, veuillez cliquer sur jouer";
    $rejouer = "Veuillez cliquer sur jouer";

    // choix 1 : les égalités
    if ( $choixPlayer ==  $choixIa )
    {
        $resultat = $egalite;
    }
    // choix 2 : condition de victoire du player 
    elseif (   $choixPlayer == "ciseaux" && $choixIa == "feuille" 
            || $choixPlayer == "pierre" && $choixIa == "ciseaux" 
            || $choixPlayer == "feuille" && $choixIa == "pierre")
            {
                $resultat = $gagner.".".$rejouer; // utilisation du bouton submit
            } 
    else {
        $resultat = "Vous avez perdu. Veuillez retenter votre chance pour espérer gagner contre l'AI";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="accueil">
        <h1>C'est Parti pour</h1>
        <h2>JANKEN GAME</h2>
        <div class= "bannierImage">
            <img src="./images/pierre.jpg" alt="image de pierre" width="100rem" height="auto">
            <img src="./images/feuille.png" alt="image de ciseaux" width="100rem" height="auto">
            <img src="./images/ciseaux.jpg" alt="image de ciseaux" width="100rem" height="auto">
        </div>
        <div class="form">
            <form method="POST">
                <label for="choix">Faite votre choix</label>
                <select name="choix" id="pet-select">
                    <option name="ciseaux" value="ciseaux">ciseaux</option>
                    <option name="pierre" value="pierre">pierre</option>
                    <option name="feuille" value="feuille">feuille</option>
                </select>
                <input type="submit" value="Jouer" name="jouer">
            </form>
        </div>
        <div class="div2">
            <p>
                <?php echo $resultat ?>
            </p>
        </div>
    </body>
</html>

<style>
h1,
h2,
.accueil, 
label {
    text-align: center;
    color:blanchedalmond;
}
body{
    background-color: black;
}
.div2{
    margin : 10px;
    font-size: xx-large;
}
.form{
    margin : 30px;
}
</style>