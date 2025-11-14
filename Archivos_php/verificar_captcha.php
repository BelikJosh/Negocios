<?php
session_start();

header('Content-Type: application/json');

$response = ['exito' => false];

if(isset($_POST['codigo']) && isset($_SESSION['captcha_code'])) {
    $response['exito'] = (strtoupper($_POST['codigo']) === $_SESSION['captcha_code']);
    
    // Eliminar el código después de usarlo (para que no se pueda reutilizar)
    unset($_SESSION['captcha_code']);
}

echo json_encode($response);
?>