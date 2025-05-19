<?php
  require_once '../vendor/autoload.php';

  $clientID = '836043440728-c9sa7q5iksaatlv0cmnf20akrd3m29n1.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/dakcom-main/Archivos_php/index.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

 
?>