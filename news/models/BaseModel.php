<?php

/**
 *
 */
class BaseModel
{

    public $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    }

    public function getAll()
    {
        $sql = "select * from $this->tablename";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function get($id)
    {
        $sql    =   "select * from $this->tablename id = ?";
        $stmt   =   $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    public function insert($array)
    {
        $args = rtrim(str_repeat('?,', count($array)), ',');

        $sql = "INSERT INTO $this->tablename (" . implode(array_keys($array), ',') . ") values($args)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values($array));

    }

    public function find($id)
    {
        $sql  = "select * from $this->tablename where id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function deleteAll()
    {
        $sql  = "delete from $this->tablename";
        $stmt = $this->db->query($sql);
        $stmt->execute();
    }
    public function delete($id)
    {
       $sql = "delete from $this->tablename where id = ?";
       $stmt = $this->db->prepare($sql);
       $stmt->execute([$id]);
                
    }
    public function update($data,$id)
    { 
        $sql = "UPDATE $this->tablename SET ";
        $updates = [];

        foreach ($data as $key => $value) {
            $updates[] = "`" . $key . "` = ?";
        }
        $sql = $sql . implode(",", $updates) . " WHERE id = ?";
        $stmt  = $this->db->prepare($sql);
        $array = array_values($data);
        array_push($array,$id);
        return $stmt->execute($array);
 
     } 

    
}
