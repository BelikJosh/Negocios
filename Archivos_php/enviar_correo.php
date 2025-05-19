<?php
// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Filtrar y sanitizar el correo y mensaje
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(strip_tags(trim($_POST['mensaje'])));

    // Validar correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Correo inválido'); window.history.back();</script>";
        exit;
    }

    // Limitar el tamaño del mensaje para evitar abusos
    if (strlen($mensaje) > 1000) {
        echo "<script>alert('Mensaje demasiado largo'); window.history.back();</script>";
        exit;
    }

    // Asunto y cabecera segura
    $asunto = "Mensaje de parte del administrador";
    $cabeceras = "From: dackom@gmail.com\r\n";
    $cabeceras .= "Reply-To: dackom@gmail.com\r\n";
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    // Enviar correo
    if (mail($correo, $asunto, $mensaje, $cabeceras)) {
        echo "<script>alert('Correo enviado correctamente'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error al enviar el correo'); window.history.back();</script>";
    }
} else {
    // Si se accede directamente al archivo, redirige
    header("Location: index.php");
    exit;
}
?>
