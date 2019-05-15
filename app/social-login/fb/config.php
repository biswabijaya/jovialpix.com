<?php
/*
 * Basic Site Settings and API Configuration
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'u333976797_lpix');
define('DB_PASSWORD', 'H4PFxLkHfnqT2ygHrH');
define('DB_NAME', 'u333976797_jovia');
define('DB_USER_TBL', 'usersauth');

// Facebook API configuration
define('FB_APP_ID', '172083197033106'); // Replace {app-id} with your app id
define('FB_APP_SECRET', '16553d958d5154d02c478a2b738f59ea'); // Replace {app-secret} with your app secret
define('FB_REDIRECT_URL', 'https://www.jovialpix.com/app/social-login/fb/');

// Start session
if(!session_id()){
	session_start();
}

// Include the autoloader provided in the SDK
require_once __DIR__ . '/facebook-php-graph-sdk/autoload.php';

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// Call Facebook API
$fb = new Facebook(array(
	'app_id' => FB_APP_ID,
	'app_secret' => FB_APP_SECRET,
	'default_graph_version' => 'v3.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
	if(isset($_SESSION['facebook_access_token'])){
		$accessToken = $_SESSION['facebook_access_token'];
	}else{
  		$accessToken = $helper->getAccessToken();
	}
} catch(FacebookResponseException $e) {
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(FacebookSDKException $e) {
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
}
