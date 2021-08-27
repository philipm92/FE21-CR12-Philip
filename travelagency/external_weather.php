<?php
session_start();
require_once 'components/db_connect.php';
require_once "components/RESTful.php";
$TABLE = $_SESSION["TABLE"];
if ($_GET) {
    // get weather data
    $city = "$_GET[lat],$_GET[long]"; //"$latitude,$longitude";
    $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $city . '?exclude=minutely,hourly,daily,alerts,flags';

    $result = curl_get($url);
    $weather = json_decode($result);
    $fahrenheit= $weather->currently->temperature; //fetch the value from the temperature option
    $celsius = round(($fahrenheit - 32) * (5 / 9), 2); //convert fahrenheit into celsius

    echo "
    <div class='card text-center text-dark bg-lighty'>
        <p class='card-title h5'>Weather:{$weather->timezone} </p>
        <div class='card-body'>
            <p class='card-text'>{$weather->currently->summary} </p>
            <p class='card-text'>{$celsius}&deg;C <strong><em>/</em></strong> {$fahrenheit}&deg;F</p>
        </div>
    </div>";

}