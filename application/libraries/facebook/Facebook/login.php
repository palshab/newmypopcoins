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

$permissions = ['email']; // Optional permissions
#$loginUrl = $helper->getLoginUrl('https://www.penducraft/webapp/fbLogin/successLogin', $permissions);
#$loginUrl  = $helper->getLoginUrl('http://www.shopotox.com/webapp/fbLogin/successLogin', $permissions);
$loginUrl = $helper->getLoginUrl('http://www.shopotox.com/application/libraries/facebook/Facebook/success.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>
