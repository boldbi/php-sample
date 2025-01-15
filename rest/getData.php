<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Rest of your PHP script
header("Content-Type: application/json");

// Read the JSON file
$data = file_get_contents('embedConfig.json');

if ($data === false) {
    http_response_code(500); // Internal Server Error
    echo "embedConfig.json file not found!";
    exit();
}

// Parse the JSON data
$dataArray = json_decode($data, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(500); // Internal Server Error
    echo json_encode(array("error" => "Could not parse the JSON data."));
    exit();
}

// Extract specific values
$clientEmbedConfigData = array(
    "DashboardId" => $dataArray["DashboardId"],
    "ServerUrl" => $dataArray["ServerUrl"],
    "SiteIdentifier" => $dataArray["SiteIdentifier"],
    "EmbedType" => $dataArray["EmbedType"],
    "Environment" => $dataArray["Environment"],
);

// Return the specific values of parsed data as JSON response
echo json_encode($clientEmbedConfigData, JSON_PRETTY_PRINT);
?>