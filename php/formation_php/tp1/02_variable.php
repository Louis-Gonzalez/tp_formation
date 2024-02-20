<?php
// Que cela marche en PHP il faut déclarer la variable à l'intérieur de la fonction 
function myCart2() {
    $y = 6;
    echo "<p>Le montant de la commande est de $y €.</p>";
}

myCart2();


$x = 5; // $x est un nombre entier ------- ATTENTION LES PORTEES DE VARIABLES SONT DIFFERENTES DE JS EN PHP-----

function myCart() {
    echo "<p>Le montant de la commande est de $x €.</p>";
}

myCart();

// Pour que la variable soit de portée golbale 

global $z;
$z = 7;

echo "$z";

// Mais la meilleur manière est la suivante : 

function myCart3() {
    global $z;  // avec le mot global porte la fonction global même si elle a été déclaré à l'extérieur
    echo "<p>Le montant de la commande est de $z €.</p>";
}

const app = "My WonderFull App"; // méthode moderne
define("APP2","My wonderfull APP2");

// l'autre solution c'est de la noté par const qui prendra directement la valeur de manière globale
// et peut-être appellé de partout

function myCart4() {
    global $z;
    echo "<p>Le montant de la commande est de $z €.</p>";
    echo "Mon application se nomme ".app;
}

myCart4();
echo "<br>";

function myCart5() {
    echo "Mon application se nomme ".APP2;
}

echo "<br>";

myCart5();
