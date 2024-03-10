<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/database.php';
include_once '../models/trip.php';

// instantiate database
$database = new Database();
$db = $database->getConnection();

// initialize trip object
$trip = new Trip($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// check if data is not empty
if (
    !empty($data->available_seats) &&
    !empty($data->countries) // assuming this is an array of country names
) {
    // set trip properties
    $trip->available_seats = $data->available_seats;
    $trip->countries = $data->countries;

    // create the trip
    if ($trip->create()) {
        // set response code - 201 created
        http_response_code(201);
        echo json_encode(array("message" => "Trip created successfully."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create trip. Service unavailable."));
    }
} else {
    // set response code - 400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create trip. Incomplete data."));
}
?>
