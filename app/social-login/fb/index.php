<?php
if(!session_id()) {
    session_start();
}
// Include configuration file
require_once 'config.php';

// Include User class
require_once 'User.class.php';

if(isset($accessToken)){
	if(isset($_SESSION['facebook_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}else{
		// Put short-lived access token in session
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler helps to manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// Set default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// Redirect the user back to the same page if url has "code" parameter in query string
	if(isset($_GET['code'])){
		header('Location: ./');
	}

	// Getting user's profile info from Facebook
	try {
		$graphResponse = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,picture');
		$fbUser = $graphResponse->getGraphUser();
	} catch(FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// Redirect user back to app login page
		header("Location: ./");
		exit;
	} catch(FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

	// Initialize User class
	$user = new User();

	// Getting user's profile data
    $fbUserData = array();
    $fbUserData['oauth_uid']  = !empty($fbUser['id'])?$fbUser['id']:'';
    $fbUserData['first_name'] = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
    $fbUserData['last_name']  = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
    $fbUserData['email']      = !empty($fbUser['email'])?$fbUser['email']:'';
    $fbUserData['gender']     = !empty($fbUser['gender'])?$fbUser['gender']:'';
    $fbUserData['picture']    = !empty($fbUser['picture']['url'])?$fbUser['picture']['url']:'';
    $fbUserData['link']       = !empty($fbUser['link'])?$fbUser['link']:'';

    // Insert or update user data to the database
    $fbUserData['oauth_provider'] = 'facebook';
    $userData = $user->checkUser($fbUserData);

    // Storing user data in the session
    $_SESSION['userData'] = $userData;

	// Get logout url
	$logoutURL = $helper->getLogoutUrl($accessToken, FB_REDIRECT_URL.'logout.php');
	$_SESSION['userData']['logouturl']=$logoutURL;

	// Render Facebook profile data
	if(!empty($userData)){
		
		$_SESSION['userstatus']="new";
		$_SESSION['email']=$email=$_SESSION['userData']['email'];
		
		include '../../../account/components/includes/db.php';

        if($result = mysqli_query($mysqli, "SELECT * From users Where email='$email'")){
          	while($res = mysqli_fetch_array($result))
          	{
          	  session_unset();
              $_SESSION['id']=$res['id'];
    		  $_SESSION['usertype']=$res['usertype'];
    		  $_SESSION['fullname']=$res['fullname'];
    		  $_SESSION['email']=$res['email'];
    		  $_SESSION['cno']=$res['cno'];
              $_SESSION['userstatus']="old";
            }
        }

		header("Location: https://www.jovialpix.com/login");
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}else{
	// Get login url
	$permissions = ['email']; // Optional permissions
	$loginURL = $helper->getLoginUrl(FB_REDIRECT_URL, $permissions);

	// Render Facebook login button
	$output = '<a id="alogin" href="'.htmlspecialchars($loginURL).'"><img src="images/fb-login-btn.png"></a>';
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Login using Facebook</title>
<meta charset="utf-8">
<!-- stylesheet file -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container" style="display:none;">
	<div class="fb-box">
		<!-- Display login button / Facebook profile information -->
		<?php echo $output; ?>
	</div>
</div>
<script> document.getElementById("alogin").click(); </script>
</body>
</html>
