<?php 

// On déclare l'espace de nom
namespace App\Models;

abstract class AbstractManager
{
    protected static  $db = null;
    protected static  $tableName = null;
    protected static  $obj = null;

    // On récupère les données de la base de données de la table
    public function getAll($nb=null, $query=null)
    {
        $limit = !is_null($nb) ? " LIMIT $nb" : "";
        $results = [];
        $default_query = "SELECT * FROM ".self::$tableName." ORDER BY id DESC";

        $sql_query = $query === null ? $default_query : $query;
        $results = self::$db->selectAll($sql_query.$limit);
        return $results;
    }
    public function getOneById($id=null) :array
    {
        $where = !is_null($id) ? " WHERE id = ?" : "";
        $row =[];
        $row = self::$db->select("SELECT * FROM ".self::$tableName." ".$where."LIMIT 1", [$id]);
        return $row;
    }

    // On insère des données dans la base de données
    public function insert($data = [])
    {
        // Pour récupérer toutes les infos de la table déclarée par $tableName
        $fields = self::$obj->getAttributes();
        foreach ($fields as $values) { // ["?", "?", "?", "?"] dans basé sur le nom de champs de la table déclarée par $tableName
            $values = "?";
        }
        $str_values = implode(", ", $values); // ?, ?, ?, ?
        $str_fields = implode(", ", $fields); // les champs de la table déclarée par $tableName
        $insert = self::$db->query("    INSERT INTO ".self::$tableName."(".$str_fields.") 
                                        VALUES (".$str_values.")", $data);
        return $insert;
    }
}

?>
