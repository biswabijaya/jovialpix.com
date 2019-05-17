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


//cart & order management program

//check if user is logged in
if (isset($_SESSION['id'])) {
  $userId=$_SESSION['id'];
  //if cart is not initiated
  if (!isset($_SESSION['cart'])) {
    // check for any active order in db
    $activeOrder=0;

    if($result = mysqli_query($mysqli, "SELECT id From orders where userid=$userId and status=1")){
    while($res = mysqli_fetch_array($result)){
        $activeOrder=$res['id'] ; //order id is used to handle persistent cart
      }
    }

    // case: active order not found = create order id and fetch it back
    if ($activeOrder==0){
      $temptoken=getUToken(); $date=date("Y-m-d");
      if ($result = mysqli_query($mysqli, "INSERT INTO orders (id, name, userid, date, status, token) VALUES (NULL, 'Online Order', '$userId', '$date', '1', '$temptoken')")) {
        if($result = mysqli_query($mysqli, "SELECT id From orders where token='$temptoken'")){
        while($res = mysqli_fetch_array($result)){
            $activeOrder=$res['id'] ; //order id is used to handle persistent cart
          }
        }
      }
    }

    // create cart
    $_SESSION['cart']=$activeOrder;
  }
}


//UserDefined Functions

// function to generate random token
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

// function to generate universally unique token >= 16 bit
function getUToken($bit=16){
   $token = "";
   if ($bit>16) {
     $length=$bit-11;
   } else {
     $length=5;
   }

   $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
   $codeAlphabet.= "0123456789";
   $max = strlen($codeAlphabet); // edited
  for ($i=0; $i < $length; $i++) {
      $token .= $codeAlphabet[random_int(0, $max-1)];
  }

  $token = $token.'-'.time();

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
