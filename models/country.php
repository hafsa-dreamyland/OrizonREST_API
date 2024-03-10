<?php
class Country {
    private $conn;
    private $table_name = "countries";
    public $id;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // READ
    function read(){
        $query = "SELECT
                        id, name
                    FROM
                        " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    function create() {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name";

        $stmt = $this->conn->prepare($query);
     
        $this->name = htmlspecialchars(strip_tags($this->name));
     
        // binding
        $stmt->bindParam(":name", $this->name);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }
    
    // UPDATE
    function update(){
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name
                WHERE
                    id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
    
        // binding
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
    

    // DELETE 
    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE name = ?";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));

        $stmt->bindParam(1, $this->name);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    } 
}
?>
