<?php
session_start();
unset($_SESSION['antibot_verified']); // Elimina la verificación previa
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>