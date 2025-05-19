<?php
session_start();

require_once './config.php';

if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  if (!isset($token['error'])) {
      $client->setAccessToken($token['access_token']);

      $google_oauth = new Google_Service_Oauth2($client);
      $google_account_info = $google_oauth->userinfo->get();

      $_SESSION['access_token'] = $token['access_token'];
      $_SESSION['user_name'] = $google_account_info->name;
      $_SESSION['user_email'] = $google_account_info->email;

      header("Location: principal.php");
      exit();
  } else {
      echo "Error en la autenticación.";
  }
}

?>
