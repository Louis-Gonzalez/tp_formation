<?php 

// on appelle la fonction native php spl_autoload_register,  qui "$class_name" est un callback  de la fonction spl_autoload_register
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require "./src/".$class_name . '.php'; // include doit être remplacé par require et modifie le chemin
});

// Version pour Mac et pour Linus
// spl_autoload_register(function ($class_name) {
//     $class_name = str_replace('\\', '/', $class_name);
//     require "./src/".$class_name . '.php'; // include doit être remplacé par require et modifie le chemin
// });

?>