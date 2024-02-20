<?php

require("./05_texte.txt"); 
// la fonction require permet d'inclure un fichier dans un autre fichier 
// require en cas de problème renverra directement une erreur fatal et stoppera le programme

include("./05_texte.txt");
// ceci fait la même chose que require
// include en cas de problème renverra seulement un warning et continuera l'éxécution du programme

require("./05_texte.html"); 
// ceci fonctione aussi avec le language html 

require("./05_code.php");
// ceci fonctionne aussi avec un fichier php

echo $time;

