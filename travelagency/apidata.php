<?php

/****************************************
*######## RESTful WEB SERVICE ##########*
*                                       *
* Client process the request VIA URL    *
* http://address.com/webservice.php?id=1*
* and gets the JSON result.             *
****************************************/
// Set Content-Type header to application/json
header("Content-Type:application/json");
session_start();
require_once 'components/db_connect.php';
$TABLE = $_SESSION["TABLE"];

//Get results
$result = $db->query("SELECT * FROM `$TABLE`");

// check just in case
if ($result->numRows() > 0) {
    //Fetch Data from database
    $travels = $result->fetchAll();
    response(200, "travel location(s) found", $travels);
} else {
    response(400, "no locations found", NULL);
}
$db->close();


// Function for delivering a JSON response
function response($status,$status_message,$data){
    // $response array
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['travels'] = $data;
 
    //Generating JSON from the $response array
    $json_response=json_encode($response);
 
    // Outputting JSON to the client
    echo $json_response;
 }