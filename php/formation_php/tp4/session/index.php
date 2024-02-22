
<?php
// pour que la session fonctionne on doit impérativement avoir un session_start() au debut de chaque fichier
session_start(); // on le mettre au début du fichier index.php

// créer la session et créer des cookies de session "PHPSESSID"
echo "<pre>";
var_dump($_SESSION);

// les informations de session sont simplement stocées dans dun tableau associatif $_SESSION et son contenu est laissé à votre entière volonté;
// les clés numériques ne fonctionnement pas, on utilisera des clés en chaine de caractères/strings
// on ajoute "le nom" de la session avec "user" qui pourrait être remplacer par une autre valeur et on lui assigne la valeur "gonzalez"
$_SESSION['user'] = 'gonzalez'; 
$_SESSION['famille'] = 'family';
$_SESSION['dad'] = 'father';
$_SESSION['mother'] = 'mother';
$_SESSION[007] = 'james_bond'; // ça ne fonctionne pas très bien
$_SESSION['plats_preferes'] = '["pomme", "banane", "fraise"]'; // on peut aussi renseigné un tableau en sortie

var_dump($GLOBALS);
?>
