<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor\autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('15570160854-t0rd02k218iu8mi6itbcbn1b73ievgm5.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://127.0.0.1/Notebook/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>