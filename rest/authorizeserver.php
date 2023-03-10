<?php
//// Embed Properties ////
$secretCode = "rjXPZulsQkMxNH01jtMLC0Nomqs359yx"; // Use your SecretCode here 
$userEmail = "soundarya.manimeharan@syncfusion.com"; // Email address of the user
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
  $embedQuerString = $embedQuerString . "&embed_user_email=" . $userEmail. "&embed_datasource_filter=[{&&StoreName=Trousers','Jackets}]";
  $embedQuerString = $embedQuerString . "&embed_server_timestamp=" . $serverTimeStamp;
  $embedSignature = "&embed_signature=" . getSignatureUrl($embedQuerString);
//echo $embedSignature;
  $embedDetailsUrl = "/embed/authorize?" . $embedQuerString . $embedSignature;
	//echo   $dashboardServerApiUrl . $embedDetailsUrl;
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
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);

  return $response;
}

//// Prepare embed_Signature by encrypting with secretCode ////
function getSignatureUrl($embedQuerString) {
  global $secretCode; 
  $keyBytes = utf8_encode($secretCode);            
  $messageBytes = utf8_encode($embedQuerString);
  $hashMessage = hash_hmac('sha256',$messageBytes, $keyBytes, true);
  $signature = base64_encode($hashMessage);
  return $signature;
}
?>
