<?php
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 13-12-2020 04:46 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 
 
 // Include the autoloader provided in the SDK
	require_once 'vendor/autoload.php';

define('APP_ID', '421463426161553');
define('APP_SECRET', 'a02a587b61682b5c8d003762bc0f2ab5');
define('API_VERSION', 'v12.0');
define('FB_BASE_URL', 'http://localhost/BFP/Home/login');

// define('BASE_URL', 'YOUR_WEBSITE_URL');

if(!session_id()){
    session_start();
}


// Call Facebook API
$fb = new Facebook\Facebook([
 'app_id' => APP_ID,
 'app_secret' => APP_SECRET,
 'default_graph_version' => API_VERSION,
]);


// Get redirect login helper
$fb_helper = $fb->getRedirectLoginHelper();


// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token']))
	{
		$accessToken = $_SESSION['facebook_access_token'];
	}
	else
	{
		$accessToken = $fb_helper->getAccessToken();
	}
}catch(FacebookResponseException $e) {
     echo 'Facebook API Error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK Error: ' . $e->getMessage();
      exit;
}

?>