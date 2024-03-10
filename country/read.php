<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../models/country.php';

$database = new Database();
$db = $database->getConnection();

$country = new Country($db);
// query products
$stmt = $country->read();
$num = $stmt->rowCount();

if($num>0){
    $countries_arr = array();
    $countries_arr["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $country_item = array(
            "id" => $row['id'],
            "name" => $row['name'],
        );
        
        array_push($countries_arr["records"], $country_item);
    }
    echo json_encode($countries_arr);
}else{
    echo json_encode(
        array("message" => "No Country found. Try again.")
    );
}
?>