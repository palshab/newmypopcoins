<?php
session_start();

 $path = $_SERVER['DOCUMENT_ROOT'].'/application/libraries/facebook/Facebook/autoload.php';
 #$path= dirname(dirname(dirname(__dir__))).'/libraries/facebook/Facebook/autoload.php';
 include_once($path);
   
$fb = new Facebook\Facebook([
  'app_id' => '983860308339415',
  'app_secret' => '0e2c0936099f0cb101b3c905fca02b4b',
  'default_graph_version' => 'v2.4',
]);
  
$helper = $fb->getRedirectLoginHelper();  
  
  
 
  
  
  
try {  
  $accessToken = $helper->getAccessToken();  
   
   
   
   $response = $fb->get('/me?fields=id,email,name,first_name,last_name,link,birthday,location,hometown', $accessToken);

} catch(Facebook\Exceptions\FacebookResponseException $e) {  
  // When Graph returns an error  
  echo 'Graph returned an error: ' . $e->getMessage();  
  exit;  
} catch(Facebook\Exceptions\FacebookSDKException $e) {  
  // When validation fails or other local issues  
  echo 'Facebook SDK returned an error: ' . $e->getMessage();  
  exit;  
}  

if (! isset($accessToken)) {  
  if ($helper->getError()) {  
    header('HTTP/1.0 401 Unauthorized');  
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {  
    header('HTTP/1.0 400 Bad Request');  
    echo 'Bad request';  
  }  
  exit;  
}  

// Logged in  
#print '<pre>';
#echo '<h3>Access Token</h3>';  
#var_dump($accessToken->getValue());  
$user = $response->getGraphUser();
print '<pre>';
print_r($user);
echo 'Name: ' . $user['name'];

?>