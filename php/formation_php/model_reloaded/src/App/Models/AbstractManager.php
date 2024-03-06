<?php 

// On déclare l'espace de nom
namespace App\Models;

// On déclare la class AbstractManager
abstract class AbstractManager
{
    // Proprièté des donnés de la class
    // static la rend disponible de partout
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

    // On récupère tous par rapport un paramètre qu'on définira en argument
    public function getAllBy($query=null, $params=[])
    {   
        $default_query = "SELECT * FROM ".self::$tableName." LIMIT 1";
        $sql_query = $query === null ? $default_query : $query;
        $row = [];
        $row = self::$db->select($sql_query, $params);
        return $row;
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
        foreach ($fields as $field) { // ["?", "?", "?", "?"] dans basé sur le nom de champs de la table déclarée par $tableName
            $values[] = "?";
        }
        $str_fields = implode(", ", $fields); // les champs de la table déclarée par $tableName
        $str_values = implode(", ", $values); // ?, ?, ?, ?
        $insert = self::$db->query("    INSERT INTO ".self::$tableName."(".$str_fields.") 
                                        VALUES (".$str_values.")", $data);
        return $insert;
    }
    // On supprime des données dans la base de données
    public function delete($id = null)
    {
        if(!is_null($id)) {
            $id = (int) $id;
            self::$db->query("DELETE FROM ".self::$tableName." WHERE id = ?", [$id]);
            return true;
        }
        return false;
    }

    // On met à jour des données dans la base de données
    public function update($id = null,$data = [])
    {
        $fields = self::$obj->getAttributes();
        foreach($fields as $k => $v){ 
            $values[] = $v."=?"; // title=?,description=?,image=?"
        }
        $str_values = implode(",",$values);
        $update = self::$db->query("UPDATE ".self::$tableName." SET ".$str_values." WHERE id='".$id."'",$data);
        return $update;
    }
    // On met à jour des données dans la base de données avec une requête avec des paramètres
    public function updateQuery($query = null, $params = []){
        $query = self::$db->query($query, $params);
        return $query;
    }

    // On supprime des données dans la base de données avec une requête avec des paramètres
    public function deleteQuery($query = null, $params = []){
        $query = self::$db->query($query, $params);
        return $query;
    }
}

?>
