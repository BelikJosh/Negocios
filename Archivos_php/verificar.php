<?php
require_once('bd_conection.php'); // Incluye la conexión a la base de datos

if ($conn->connect_error) {
    // Si la conexión falla, redirige a la página principal de mantenimiento (index.html)
    header('Location: ../index.html');
    exit();
} else {
    // Si la conexión es exitosa, redirige a index.php en Archivos_php
    header('Location: index.php');
    exit();
}
?>
