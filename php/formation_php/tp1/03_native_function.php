<?php

// Afficher la date et l'heure en différent format possible :

$today1 = date("Y-m-d H:i:s"); // ici les parmètres de la fonction peuvent être appelés dans un ordre différent
echo "$today1";
echo "<br>";

$today2 = date("d-m-Y H:i:s");
echo "$today2";
echo "<br>";

// Afficher la différence entre la date du 1 janvier 1970 : 

    $time = time();
    echo "<h4>Le temps écoulé depuis le 1er janvier 1970 est de $time en ms.</h4>";
    echo "<br>";

// Afficher la valeur de Pi
$pi = pi();
echo "<h5> La valeur de Pi est environ $pi .</h5>";

// Afficher la valeur d'une racine carré
$rootsq = sqrt(25);
echo "<h5> La valeur de la racine carré de 25 est $rootsq .</h5>";

// Tirer un nombre aléatoire entre 0 et 9

$random = rand(0,5);
echo "Tirer un nom aléatoire entre 0 et 9 <<< $random >>>";

$array_img = [
    "https://cdn.pixabay.com/photo/2024/01/15/21/16/dog-8510901_1280.jpg", // chemin absolu de type url
    "https://cdn.pixabay.com/photo/2023/12/05/03/31/bee-8430675_960_720.jpg",
    "https://cdn.pixabay.com/photo/2024/01/11/09/50/village-8501168_960_720.jpg",
    "https://cdn.pixabay.com/photo/2024/01/15/19/40/animal-8510775_960_720.jpg",
    "../img/img1.jpg", // chemin relatif depuis le stockage local
    "../img/img2.jpg",
];

echo "<h5>On veut retourner un tableau en json</h5>";
echo json_encode($array_img);
echo "<h5>On veut compter le nombre d'entrées dans le tableau</h5>";

echo "<br>";
echo count($array_img);
echo "<br>";
echo "<br>";

$array_vid = [
    "../img/vidtest.mp4"
];

$source = $array_img[$random];
echo "tirer un nbombre aléatoire entre 0 et 9: <strong>$random</strong>";
echo "<img src=\"$source\" alt=\"Random Image\"width=\"100%\">"; 
// commande qui affiche les images 
echo "<br>";
echo "<br>";

echo "<video controls preload=\"metadata\" src=\"$array_vid[0]\" alt=\"Random Image\"width=\"100%\">";
// commande qui affiche une vidéo

