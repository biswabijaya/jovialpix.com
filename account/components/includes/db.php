<?php
if(!isset($_SESSION)) { session_start(); }

if(!isset($_SESSION['email'])){
    $_SESSION['email']="";
}

//set timezone
date_default_timezone_set('Asia/Kolkata');
setlocale(LC_MONETARY, 'en_US');

$databaseHost = 'localhost';
$databaseName = 'u333976797_jovia';
$databaseUsername = 'u333976797_lpix';
$databasePassword = 'H4PFxLkHfnqT2ygHrH';

$mysqli =  mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$_SESSION['DIR']="jovialpix.com";
$cname="JovialPix";
$active=" ";

function getToken($length){
   $token = "";
   $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
   $codeAlphabet.= "0123456789";
   $max = strlen($codeAlphabet); // edited
  for ($i=0; $i < $length; $i++) {
      $token .= $codeAlphabet[random_int(0, $max-1)];
  }

  return $token;
}

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

if(substr($_SERVER['SERVER_NAME'],0,4) != "www." && $_SERVER['SERVER_NAME'] != 'localhost'){
    header('Location: http://www.'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
}
?>
