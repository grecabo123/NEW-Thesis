<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('662742889961-vd3nhrmupasv5gbms0clun5f8ea43oun.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://localhost/BFP/Home/controller.php');


$google_client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");


$login_url = $google_client->createAuthUrl();

// session_start();

?>