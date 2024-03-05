<?php

//on déclare l'espace de nom
namespace App\Models;

// On utilise BDD
use App\Services\DataBase;

// on déclare la class AbstractTable
abstract class AbstractTable 
{
    // la norme de protection est de la manière suivantre 
    protected ?int $id = null;
    protected ?string $className = null;
    // On crée un id
    public function __construct(?int $id = null)
    {
        // on peut définir l'id si nécessaire
        $this->id = $id;
        // on peut aussi définir le nom de la class
        $this-> setClassName($this);
    }
    // On construit le nom de class
    public function setClassName(?object $obj) : void
    {
        $this->className = get_class($obj);
    }
    // On récupère le nom de la class 
    public function getClassName(): ?string
    {
        return $this->className;
    }

    /*
    @return un array des attributs
    en enlevant les attributs 'id' et 'className'
    pour faire une requête d'un "insert" et d'un "update"
    */
    public function getAttributes(): ?array
    {
        // tableau de tous cles champs d'une class
        $attributes = [];
        // On exclut les champs suivant : "id" et "className"
        $filter = ['id', 'className'];
        // On crée le nom par défaut de la Class en récupérant la valeur par defaut avec "get_class_vars"
        $class = get_class_vars($this->getClassName());
        // on boucle sur le tableau des champs 
        foreach ($class as $key => $value) {
            // on vérifie si le champs est dans le tableau et s'il n'y est pas on ajoute le champs
            if (!in_array($key, $filter)) 
            {
                // On récupère les valeurs par rapport aux clés des champs du tableau
                $attributes[] = $key;
            }
        }
        // On retourne le tableau 
        return $attributes;
    }


}