<?php

$jsonData = file_get_contents('embedConfig.json');

if ($jsonData === false) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(array('error' => 'embedConfig.json file not found.'));
    exit(1);
}

// Remove UTF-8 BOM if present
if (substr($jsonData, 0, 3) === "\xEF\xBB\xBF") {
    $jsonData = substr($jsonData, 3);
}

$appConfig = json_decode($jsonData, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(array(
        'error' => 'Could not parse embedConfig.json',
        'json_error' => json_last_error_msg()
    ));
    exit(1);
}

// Handle CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

// Set response headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/plain'); // ✅ Plain text for token

echo getToken($appConfig);

function getToken($config)
{
    $embedDetails = [
        "email" => $config['UserEmail'],
        "serverurl" => $config['ServerUrl'],
        "siteidentifier" => $config['SiteIdentifier'],
        "embedsecret" => $config['EmbedSecret'],
        "dashboard" => [
            "id" => $config['DashboardId']
        ]
    ];

    // Send POST request to Bold BI server
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $embedDetails["serverurl"] . "/api/" . $embedDetails["siteidentifier"] . "/embed/authorize");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($embedDetails));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        curl_close($ch);
        return "Error: " . curl_error($ch);
    }

    curl_close($ch);

    // Decode JSON and extract token
    $decoded = json_decode($response, true);
    return $decoded['Data']['access_token'] ?? "Error: Token not found";
}
