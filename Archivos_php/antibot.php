<?php
session_start();
ob_start();

// Registrar tiempo de verificación
$_SESSION['captcha_time'] = time();

// Redirección si ya está verificado
if(isset($_SESSION['antibot_verified']) && $_SESSION['antibot_verified'] === true) {
    header('Location: empleados.php');
    exit();
}

// Procesar formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_code = strtoupper($_POST['captcha_code'] ?? '');
    
    if(!empty($_SESSION['captcha_code']) && $user_code === $_SESSION['captcha_code']) {
        $_SESSION['antibot_verified'] = true;
        unset($_SESSION['captcha_code']);
        header('Location: empleados.php');
        exit();
    } else {
        $error = "Código incorrecto. Por favor, inténtalo de nuevo.";
        // Regenerar el CAPTCHA después de un fallo
        unset($_SESSION['captcha_code']);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Seguridad</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --error-color: #f72585;
            --success-color: #4cc9f0;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .captcha-container {
            width: 100%;
            max-width: 480px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2.5rem;
            text-align: center;
            transition: var(--transition);
        }
        
        .logo {
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 500;
        }
        
        h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        
        .description {
            color: var(--dark-gray);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }
        
        .captcha-wrapper {
            margin: 1.5rem 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        
        .captcha-image {
            padding: 15px;
            background: var(--light-gray);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.05);
        }
        
        .captcha-image img {
            height: 50px;
            user-select: none;
            -webkit-user-select: none;
        }
        
        .reload-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            margin-left: 10px;
        }
        
        .reload-btn:hover {
            background: var(--secondary-color);
            transform: rotate(90deg);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-gray);
            font-size: 0.9rem;
        }
        
        #captcha_code {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: var(--border-radius);
            font-size: 1rem;
            text-transform: uppercase;
            text-align: center;
            transition: var(--transition);
        }
        
        #captcha_code:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .submit-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .submit-btn:hover {
            background: var(--secondary-color);
        }
        
        .error {
            color: white;
            background: var(--error-color);
            padding: 12px;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .footer-text {
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: var(--dark-gray);
        }
        
        @media (max-width: 576px) {
            .captcha-container {
                padding: 1.5rem;
            }
            
            .logo {
                font-size: 1.5rem;
            }
            
            h2 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="captcha-container">
        <div class="logo">Seguridad</div>
        <h2>Verificación de Seguridad</h2>
        <p class="description">Por favor, introduce el código que aparece en la imagen para continuar.</p>
        
        <?php if(isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="captcha-wrapper">
                <div class="captcha-image">
                    <img src="captcha_image.php?<?= time() ?>" alt="CAPTCHA" id="captcha-img">
                </div>
                <button type="button" class="reload-btn" onclick="refreshCaptcha()" title="Actualizar código">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                    </svg>
                </button>
            </div>
            
            <div class="form-group">
                <label for="captcha_code">Código de verificación</label>
                <input type="text" name="captcha_code" id="captcha_code" required 
                       maxlength="6" autocomplete="off" autofocus>
            </div>
            
            <button type="submit" class="submit-btn">Verificar y Continuar</button>
        </form>
        
        <p class="footer-text">Esta verificación ayuda a proteger nuestro sitio contra accesos no autorizados.</p>
    </div>

    <script>
    function refreshCaptcha() {
        const img = document.getElementById('captcha-img');
        const btn = document.querySelector('.reload-btn');
        
        // Agregar animación de giro
        btn.style.transform = 'rotate(360deg)';
        
        // Cambiar la imagen CAPTCHA
        img.src = 'captcha_image.php?' + new Date().getTime();
        document.getElementById('captcha_code').value = '';
        document.getElementById('captcha_code').focus();
        
        // Restablecer el botón después de la animación
        setTimeout(() => {
            btn.style.transform = 'rotate(0)';
        }, 300);
    }
    
    // Enfocar el campo de entrada al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('captcha_code').focus();
    });
    </script>
</body>
</html>
<?php ob_end_flush(); ?>