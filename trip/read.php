<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../models/trip.php';

$database = new Database();
$db = $database->getConnection();

$trip = new Trip($db);

$stmt = $trip->read();
$num = $stmt->rowCount();

if($num > 0){
    $trips_arr = array();
    $trips_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $trip_item = array(
            "id" => $id,
            "available_seats" => $available_seats,
            "countries" => $countries
        );
        array_push($trips_arr["records"], $trip_item);
    }

    http_response_code(200); // OK
    echo json_encode($trips_arr);
} else {
    http_response_code(404); // Not found
    echo json_encode(array("message" => "No trips found."));
}
?>