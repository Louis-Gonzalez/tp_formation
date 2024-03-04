<?php

//on déclare l'espace de nom
namespace App\Models;

use App\Services\DataBase;

// on déclare la class AbstractTable
abstract class AbstractTable 
{
    // la norme de protection est de la manière suivantre 
    protected ?int $id = null;
    protected ?string $className = null;

    public function __construct(?int $id = null)
    {
        // on peut définir l'id si nécessaire
        $this->id = $id;
        // on peut aussi définir le nom de la class
        $this-> setClassName($this);
    }

    public function setClassName(?object $obj) : void
    {
        $this->className = get_class($obj);
    }

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
        $attributes = [];
        $filter = ['id', 'className'];
        $class = get_class_vars($this->getClassName());
        foreach ($class as $key => $value) { 
            if (!in_array($key, $filter)) 
            {
                $attributes[$key] = $value;
            }
        }
        return $attributes;
    }


}