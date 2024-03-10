<?php
class Trip {
    private $conn;
    private $table_name = "trips";
    public $id;
    public $available_seats;
    public $countries;  // Array to store the countries involved in the trip


    public function __construct($db) {
        $this->conn = $db;
    }

    // READ
    function read($country = null, $available_seats = null){
        // Base query to retrieve trips along with their associated countries
        $query = "SELECT
                        t.id, t.available_seats, GROUP_CONCAT(c.name SEPARATOR ', ') as countries
                    FROM
                        " . $this->table_name . " t
                    LEFT JOIN trip_countries tc ON t.id = tc.trip_id
                    LEFT JOIN countries c ON tc.country_id = c.id";

        // Conditions to filter the results based on parameters
        $conditions = array();
        $params = array();

        // Filter by country
        if(!empty($country)){
            $conditions[] = "c.name = ?";
            $params[] = $country;
        }

        // Filter by available seats
        if(!empty($available_seats)){
            $conditions[] = "t.available_seats >= ?";
            $params[] = $available_seats;
        }

        // Add WHERE clause if there are conditions
        if(!empty($conditions)){
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        // Group by trip ID
        $query .= " GROUP BY t.id";

        // Prepare and execute the query
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    // CREATE
    function create() {
        $query = "INSERT INTO " . $this->table_name . " (available_seats) VALUES (:available_seats)";
        $stmt = $this->conn->prepare($query);

        $this->available_seats = htmlspecialchars(strip_tags($this->available_seats));

        $stmt->bindParam(":available_seats", $this->available_seats);

        if($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            // Insert corresponding rows in the trip_countries table to associate countries with the trip
            if($this->associateCountries()) {
                return true;
            }
        }

        return false;
    }

// UPDATE
function update(){
    $query = "UPDATE " . $this->table_name . " SET available_seats = :available_seats WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->available_seats = htmlspecialchars(strip_tags($this->available_seats));

    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":available_seats", $this->available_seats);

    if($stmt->execute()){
        return true;
    }

    return false;
}

// DELETE
function delete(){
    // Delete associated records in the trip_countries table
    $query_delete_associated = "DELETE FROM trip_countries WHERE trip_id = :trip_id";
    $stmt_delete_associated = $this->conn->prepare($query_delete_associated);
    $stmt_delete_associated->bindParam(":trip_id", $this->id);
    $stmt_delete_associated->execute();

    // Delete the trip record
    $query_delete_trip = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt_delete_trip = $this->conn->prepare($query_delete_trip);
    $stmt_delete_trip->bindParam(":id", $this->id);

    if($stmt_delete_trip->execute()){
        return true;
    }

    return false;
} 


  // Method to associate countries with the trip
private function associateCountries() {
    if(!empty($this->countries) && is_array($this->countries)) {
        $query = "INSERT INTO trip_countries (trip_id, country_id) VALUES ";
        $values = array();
        foreach($this->countries as $country) {
            // Fetch the country ID based on the country name
            $query_country_id = "SELECT id FROM countries WHERE name = ?";
            $stmt_country_id = $this->conn->prepare($query_country_id);
            $stmt_country_id->bindParam(1, $country);
            $stmt_country_id->execute();
            $country_id = $stmt_country_id->fetchColumn();

            // If country ID is found, add it to the values array
            if($country_id) {
                $values[] = "(" . $this->id . ", " . $country_id . ")";
            }
        }
        // If there are values to insert, execute the query
        if(!empty($values)) {
            $query .= implode(",", $values);
            $stmt = $this->conn->prepare($query);
            return $stmt->execute();
        }
    }
    return true; // If no countries are provided or no valid country IDs found, return true
}
}

?>