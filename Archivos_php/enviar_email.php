<?php
header('Content-Type: text/plain; charset=UTF-8');

// Validar que la solicitud sea POST y AJAX
if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header("HTTP/1.1 403 Forbidden");
    die("Acceso no permitido");
}

// Validar y sanitizar los datos de entrada
$destinatario = filter_var($_POST["correo"] ?? '', FILTER_SANITIZE_EMAIL);
$mensaje = filter_var($_POST["mensaje"] ?? '', FILTER_SANITIZE_STRING);
$asunto = filter_var($_POST["asunto"] ?? 'Consulta sobre pedido', FILTER_SANITIZE_STRING);

// Validar el correo electrónico
if (!filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
    header("HTTP/1.1 400 Bad Request");
    die("Dirección de correo electrónico no válida");
}

// Validar que el mensaje no esté vacío
if (empty($mensaje)) {
    header("HTTP/1.1 400 Bad Request");
    die("El mensaje no puede estar vacío");
}

// Limitar la longitud del mensaje (opcional)
if (strlen($mensaje) > 2000) {
    header("HTTP/1.1 400 Bad Request");
    die("El mensaje es demasiado largo");
}

// Configurar cabeceras de seguridad
$cabeceras = "From: no-reply@tudominio.com\r\n";
$cabeceras .= "Reply-To: no-reply@tudominio.com\r\n";
$cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";
$cabeceras .= "X-Mailer: PHP/" . phpversion();

// Intentar enviar el correo
try {
    $enviado = mail($destinatario, $asunto, $mensaje, $cabeceras);
    
    if ($enviado) {
        echo "Mensaje enviado con éxito a " . $destinatario;
    } else {
        throw new Exception("Error al enviar el mensaje");
    }
} catch (Exception $e) {
    header("HTTP/1.1 500 Internal Server Error");
    error_log("Error al enviar correo: " . $e->getMessage());
    die("Error al enviar el mensaje. Por favor intente nuevamente.");
}
?>