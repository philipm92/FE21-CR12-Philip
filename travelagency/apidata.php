<?php
session_start();
require_once 'components/db_connect.php';
$TABLE = $_SESSION["TABLE"];

//Get results
 $result = $db->query("SELECT * FROM `$TABLE`");

//Fetch Data from database
$travels = $result->fetchAll();

//js_encode is the php method for JSON.stringify
echo json_encode($travels); 