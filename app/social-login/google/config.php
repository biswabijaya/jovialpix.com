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

// Google API configuration
define('GOOGLE_CLIENT_ID', '801586334855-1skoofa692slb22u6uqskco7fg8hj28r.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'B6CoBn4uyVLImxvaduvhcRgI');
define('GOOGLE_REDIRECT_URL', 'https://www.jovialpix.com/app/social-login/google/');

// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to jovialpix.com');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
