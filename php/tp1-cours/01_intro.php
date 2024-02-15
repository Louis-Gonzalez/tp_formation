<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma première page PHP</title>
</head>
<body>
    <h1>C'est ma première page PHP</h1>

    <!-- tout ce qui se trouvera entre les bornes ?php ? phpinfo() est une fonction native de php
    toutes les variables en pHp comencent par $ exemple $date = "", on peut pas mettre de nombre 
    tout de suite derrièe un $. On doit intercalé un caractère alphabétique exemple $d2ate -->

    <?php
        $date = "La date du jour est le 29-01-2024"; // chaine de caractère 
        $total1 = 50;
        $total = 50+15; // le + sert pour les numbers
        $delivery = true; // booleen
        $vat = $total*0.2; // les floats sont noté avec un point
        $tauxsolde = 50;
        $prixsolde = $total - (($total * $tauxsolde)/100);
        $tableau = [1,2,3,4,5,6]; // on pourrait écrire array(1,2,3,4,5,6)
        $tableau2 = ["banane" => "milksake", "poire"=> "bell Hèlène", "pomme"=>"tatin" ]; 
        // tableau associatif se comporte comme un objet

        echo $date;
        echo "<br>";        
        echo "<br>"; 

        echo $tableau; // affiche la tableau ainsi ne fonctionne pas 
        echo "<br>";        
        echo "<br>"; 

        var_dump($tableau); // affiche à ressemble la valeur de tableau 
        echo "<br>";        
        echo "<br>";  

        print_r($tableau); // affiche à ressemble la valeur de tableau 
        echo "<br>";        
        echo "<br>";

        echo $tableau[0]; // affiche la valeur du tableau à l'indice 0
        echo "<br>";        
        echo "<br>"; 

        echo json_encode($tableau); // le tableau en entier 
        echo "<br>";        
        echo "<br>"; 

        var_dump($tableau2); // affiche à ressemble la valeur de tableau 
        echo "<br>";        
        echo "<br>";  

        echo "Le montant total1 de la commande est de $total1 €";
        echo "<br>";
        echo "<br>";      
        
        echo "Le montant total de la commande est de ".$total."€"; // la concaténation en pHp se fait avec 
        // un encadrement avec un . 
        echo "<br>";
        echo "<br>"; 

        echo "La tva est de $vat €"; // ici on affiche la TVA
        echo "<br>";
        echo "<br>"; 
        
        echo " La remise est de $tauxsolde %, le prix soldé est de $prixsolde € vous avez $vat € de TVA.";

        echo "<br>";
        echo "<br>";
        var_dump($total); // var_dump est une fonction native de débogage est l'équivalent de console.log en JS
        echo "<br>";
        echo "<br>";

        echo "<pre>"; // modification synthasique html avce la balise <pre>
        echo $date;
        echo "</pre>"; // arrête la modification synthasique de l'Html
        echo "<br>";        
        echo "<br>"; 

        class Voiture { // création d'une class Voiture orienté objet
            private $color = "red"; // le mot public rent la clé color disponible en dehors de la classe
            public $energy = "gasoil"; // mise en privée ici 
            public function start() { // on peut aussi intégrer une fonction stat()
                echo "Vroooum Vrooooouuuuum";
            }
        }
        $twingo = new Voiture(); // instancie la variable twingo avec la class Voiture
        $tesla = new Voiture();
        var_dump($twingo);
        echo "<br>";        
        echo "<br>"; 

        var_dump($tesla);
        $tesla->energy = "electric"; // modification de la valeur $energy 
        echo "<br>";        
        echo "<br>"; 

        var_dump($tesla);
        echo "<br>";        
        echo "<br>"; 

        $tesla->start(); // ceci appelle la function start() de la class voiture car tesla est instencie dans la class Voiture
        echo "<br>";        
        echo "<br>"; 

        var_dump($tesla->option); // ceci va renvoie une erreur de prporty undefined mais la valeur undifened n'existe 
        // pas en php mais la valeur associé est null
        echo "<br>";        
        echo "<br>"; 

        // les différentes possibles en php sont : int, string, float, array, objet, null et ressource



        phpinfo();
    ?>
    <!--le code html peut interprété par pHp à l'intérieur de ses balises en écrivant le code html entre " "-->
</body>
</html>