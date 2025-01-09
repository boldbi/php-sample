<?php
$jsonData = file_get_contents('embedConfig.json');

if ($jsonData === false) {
    echo 'Error: embedConfig.json file not found.';
    exit(1); // Exit the program with a non-zero exit code to indicate an error
}

$appConfig = json_decode($jsonData, true);

$secretCode = $appConfig['EmbedSecret'];
$userEmail = $appConfig['UserEmail'];

$serverTimeStamp=time();
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
  header('Access-Control-Allow-Headers: token, Content-Type');
  header('Access-Control-Max-Age: 1728000');
  header('Content-Length: 0');
  header('Content-Type: text/plain');
  die();
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Getting embedQuerString and dashboardServerApiUrl from BoldBI wrapper 
if ($data != null && $data["embedQuerString"] !="" && $data["dashboardServerApiUrl"]!="") {
  $embedQuerString = $data["embedQuerString"];
  $dashboardServerApiUrl= $data["dashboardServerApiUrl"];
  $dashdetails = GetEmbedDetails($embedQuerString, $dashboardServerApiUrl);
  header('Content-type: application/json');
  echo json_encode($dashdetails);
}
 
// This function used to get dashboard details from Bold BI Server 
function GetEmbedDetails($embedQuerString, $dashboardServerApiUrl){
  global $userEmail;
  global $serverTimeStamp;
  $embedQuerString = $embedQuerString . "&embed_user_email=" . $userEmail;
  $embedQuerString = $embedQuerString . "&embed_server_timestamp=" . $serverTimeStamp;
  $embedSignature = "&embed_signature=" . getSignatureUrl($embedQuerString);
  $embedDetailsUrl = "/embed/authorize?" . $embedQuerString . $embedSignature;

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $dashboardServerApiUrl . $embedDetailsUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 50000,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json"
    ),
  ));
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  return $response;
}

// Prepare embed_Signature by encrypting with secretCode
function getSignatureUrl($embedQuerString) {
  global $secretCode; 
  $keyBytes = mb_convert_encoding($secretCode, 'UTF-8');
  $messageBytes = mb_convert_encoding($embedQuerString, 'UTF-8');
  $hashMessage = hash_hmac('sha256',$messageBytes, $keyBytes, true);
  $signature = base64_encode($hashMessage);
  return $signature;
}
?>