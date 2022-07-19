<?php
require './logica/conexion.php';
require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = '1034652970639-pg0erhh7ffh34im55sk5pq2um9801298.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/encuesta/login.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile"); ?>