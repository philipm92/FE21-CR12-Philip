<?php

function build_query_string(array $params) {
    $query_string = http_build_query($params);
    //generates URL-encoded for a query string
    return $query_string;
}

function curl_get($url) {
    // Initializes a new CURL and prepares for next step
    $client = curl_init($url);

    // Set an option for a CURL transfer
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    // it executes the CURL and return a string
    $response = curl_exec($client);

    // Closes a CURL session and frees all resources.
    curl_close($client);

    return $response;
}