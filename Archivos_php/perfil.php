<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'config.php';
require_once 'conection.php';  // Para conexión a la base de datos

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $google_client->setAccessToken($_SESSION['access_token']);
    // Obtener información del usuario
    $google_service = new Google_Service_Oauth2($google_client);
    $google_user_info = $google_service->userinfo->get();
    
    // Obtener nombre y correo
    $nombre = $google_user_info['name'];
    $correo = $google_user_info['email'];

    // Mostrar el perfil
    echo "
    <div style='max-width: 500px; margin: 50px auto; padding: 20px; text-align: center; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;'>
        <h1>Bienvenido, $nombre</h1>
        <p>Correo: $correo</p>
        
        <form action='perfil.php' method='POST'>
            <button type='submit' name='guardar' style='padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;'>Continuar</button>
        </form>
        
        <form action='perfil.php' method='POST'>
            <button type='submit' name='cerrar_sesion' style='padding: 10px 20px; margin: 10px; background-color: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer;'>Cerrar sesión</button>
        </form>
    </div>";

    // Si el usuario hace clic en "Cerrar sesión"
    if (isset($_POST['cerrar_sesion'])) {
        session_destroy();  // Destruir la sesión
        header("Location: principal.php");  // Redirigir al inicio de sesión
        exit();
    }

    // Guardar en la base de datos cuando el usuario haga clic en continuar
    if (isset($_POST['guardar'])) {
        // Conectar a la base de datos
        $conn = mysqli_connect('localhost', 'root', '', 'dakcom');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insertar o verificar si el usuario ya existe
        $result = insert_or_verify_user($conn, $nombre, $correo);
        if ($result === true) {
            // Redirigir a principal.php
            header("Location: principal.php");
            exit();
        } else {
            echo "<p style='color: red;'>Error al guardar el usuario: $result</p>";
        }
    }
    exit();
}

// Si no hay token de acceso, redirigir para iniciar sesión con Google
if (isset($_GET['action']) && $_GET['action'] == 'login') {
    // Generar la URL de autenticación de Google
    $auth_url = $google_client->createAuthUrl();
    // Redirigir al usuario para la autenticación
    header("Location: " . $auth_url);
    exit();
}

// Si el código de Google está disponible, obtener el token
if (isset($_GET['code'])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token['access_token'];

    // Redirigir de nuevo a perfil.php para obtener los detalles del usuario
    header('Location: perfil.php');
    exit();
}


function insert_or_verify_user($conn, $nombre, $correo) {
    // Verificar si el usuario ya existe
    $query = "SELECT id FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        return true; // El usuario ya existe
    }

    // Insertar el nuevo usuario si no existe
    $query = "INSERT INTO usuarios (nombre, correo) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $nombre, $correo);
    if ($stmt->execute()) {
        return true; // Usuario guardado correctamente
    } else {
        return "Error al guardar el usuario: " . $stmt->error;
    }
}

?>