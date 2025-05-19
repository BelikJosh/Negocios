<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario hace clic en "Cerrar sesión"
if (isset($_POST['logout'])) {
    // Eliminar el token de acceso y destruir la sesión
    unset($_SESSION['access_token']);
    session_destroy(); // Destruir toda la sesión

    // Redirigir a la página de inicio o principal (sin iniciar sesión)
    header("Location:principal.php");
    exit();
}

// Verificar si el usuario está autenticado
$usuario_autenticado = false;
$nombre = '';
$correo = '';

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    if (isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
        $nombre = $_SESSION['user_name'];
        $correo = $_SESSION['user_email'];
        $primer_nombre = explode(' ', $nombre)[0];
        $usuario_autenticado = true;
    }
}
?>
<link rel="stylesheet" href="../Archivos_css/estilos.css">
<link rel="stylesheet" href="../Archivos_css/carrito.css">
<link rel="stylesheet" href="../Archivos_css/modal.css">

<nav class="navegador contenedor">
    <img class="icon" src="../img/dakcom.png" width="100px" alt="Logo DakCom">
    <div class="buscador">
        <input type="text" name="" id="" placeholder="En mantenimiento..." disabled>
        <div class="icon-buscar"><i class="fa fa-search icon-buscar" aria-hidden="true"></i></div>
    </div>
    <ul class="nav contenedor">
        <li>
            <?php if ($usuario_autenticado): ?>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" id="userDropdown">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span class="carrito"><?php echo htmlspecialchars($primer_nombre); ?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <form method="post" action="">
                            <button type="submit" name="logout" class="dropdown-item">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <a href="condiciones.php">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="carrito">Iniciar sesión</span>
                </a>
            <?php endif; ?>
        </li>
        <li>
            <a href="#" id="cartButton">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="carrito">Mi carrito</span>
                <i class="fa fa-circle circulo" aria-hidden="true"></i>
                <span id="cartCount" class="numero">0</span>
            </a>
    </ul>
</nav>

<div id="historialPedidos" style="display: none;">
</div>


<nav class="all-cat">
    <ul class="contenedor nav2">
        <input type="checkbox" id="btn-menu">
        <li>
            <label for="btn-menu">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </label>
            <span>Todas las categorias</span>
            <ul class="submenu">
                <label for="btn-menu">
                    <i class="fas fa-times-circle"></i></label>
                <a href="componentes.php">
                    <li>Componentes
                        <ul class="submenu2">
                            <a href="componentes.php">
                                <li>Ver todo Componentes</li>
                            </a>
                            <li class="subtitulos-cat">Componentes</li>
                            <a href="procesadores.php">
                                <li>Procesador</li>
                            </a>
                            <a href="tarjetas-graficas.php">
                                <li>tarjeta grafica</li>
                            </a>
                            <a href="memorias-ram.php">
                                <li>memorias ram</li>
                            </a>
                            <a href="placas-base.php">
                                <li>placa madre</li>
                            </a>
                            <a href="discos-duros.php">
                                <li>disco duro</li>
                            </a>
                            <a href="fuentes-de-poder.php">
                                <li>fuente de poder</li>
                            </a>
                            <a href="gabinetes.php">
                                <li>gabinete</li>
                            </a>
                        </ul>
                </a>
        </li>
        <a href="ordenadores.php">
            <li>Ordenadores
                <ul class="submenu2">
                    <a href="ordenadores.php">
                        <li>ver todo ornedadores</li>
                    </a>
                    <li class="subtitulos-cat">laptops</li>
                    <a href="portatiles.php">
                        <li>laptop</li>
                    </a>
                    <li class="subtitulos-cat">pc's</li>
                    <a href="sobremesa.php">
                        <li>pc</li>
                    </a>
                </ul>
            </li>
        </a>
        <a href="perifericos.php">
            <li>Perifericos
                <ul class="submenu2">
                    <a href="perifericos.php">
                        <li>ver todo perifericos</li>
                    </a>
                    <li class="subtitulos-cat">teclados</li>
                    <a href="teclados.php">
                        <li>teclado</li>
                    </a>
                    <li class="subtitulos-cat">mouse</li>
                    <a href="ratones.php">
                        <li>mouse</li>
                    </a>
                    <li class="subtitulos-cat">audifonos</li>
                    <a href="audifonos.php">
                        <li>audifonos</li>
                    </a>
                </ul>
            </li>
        </a>
        <a href="monitores.php">
            <li>Monitores
                <ul class="submenu2">
                    <a href="monitores.php">
                        <li>ver todo monitores</li>
                    </a>
                    <li class="subtitulos-cat">monitores</li>
                    <a href="monitores.php">
                        <li>monitor</li>
                    </a>
                </ul>
            </li>
        </a>
        <a href="tablets.php">
            <li>Tablets
                <ul class="submenu2">
                    <a href="tablets.php">
                        <li>ver todo tablets</li>
                    </a>
                    <li class="subtitulos-cat">tablets</li>
                    <a href="tablets.php">
                        <li>tablet</li>
                    </a>
                </ul>
            </li>
        </a>
        <a href="celulares.php">
            <li>Celulares
                <ul class="submenu2">
                    <a href="celulares.php">
                        <li>ver todo celulares</li>
                    </a>
                    <li class="subtitulos-cat">celulares</li>
                    <a href="celulares.php">
                        <li>celular</li>
                    </a>
                </ul>
            </li>
        </a>
    </ul>
    </li>

    <div class="nav21">
        <p>La mejor tienda online servicio, calidad, precio</p>
    </div>
    </ul>
</nav>

<div id="carritoPopup" class="carrito-popup">
    <span id="cerrarCarrito" class="cerrar"
        style="font-size: 2rem; color: #ffffff; position: absolute; top: 10px; right: 10px; cursor: pointer;background: #cf2500; padding:2px;
">
        &times;
    </span>

    <div class="carrito-contenido" id="carritoContenido">
        <p>No hay productos en el carrito.</p>
    </div>
    <div class="carrito-total">
        <span id="total">Total: $0.00</span>
        <button style="background-color: #979696; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" onclick="vaciarCarrito()">Vaciar carrito</button>
        <button style="background-color: #3264d7; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" onclick="pagarCarrito()">Pagar</button>
    </div>
</div>

<!-- Modal para los datos del cliente - Diseño mejorado -->
<div id="datosClienteModal" class="modal">
    <div class="modal-content" style="max-width: 500px;">
        <div class="modal-header">
            <h2>Información del Cliente</h2>
            <span id="closeClienteModal" class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form id="datosClienteForm">
                <div class="form-group">
                    <label for="nombreCliente">Nombre Completo</label>
                    <input type="text" id="nombreCliente" placeholder="Ej: Juan Pérez" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="emailCliente">Correo Electrónico</label>
                        <input type="email" id="emailCliente" placeholder="Ej: juan@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoCliente">Teléfono</label>
                        <input type="tel" id="telefonoCliente" placeholder="Ej: 555-1234567" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="direccionCliente">Dirección de Envío</label>
                    <textarea id="direccionCliente" rows="3" placeholder="Calle, número, colonia, ciudad, estado, código postal" required></textarea>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-continuar" onclick="mostrarMetodoPago()">
                        Continuar al Pago <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para seleccionar método de pago - Solo Tarjeta -->
<div id="metodoPagoModal" class="modal">
    <div class="modal-content" style="max-width: 500px;">
        <div class="modal-header">
            <h2>Método de Pago</h2>
            <span id="closeMetodoPagoModal" class="close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="payment-card">
                <div class="card-icons">

                </div>

                <form id="creditCardForm">
                    <div class="form-group">
                        <label for="cardNumber">Número de Tarjeta</label>
                        <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" required>
                    </div>

                    <div class="form-group">
                        <label for="cardName">Nombre en la Tarjeta</label>
                        <input type="text" id="cardName" placeholder="Como aparece en la tarjeta" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="cardExpiry">Fecha de Expiración</label>
                            <input type="text" id="cardExpiry" placeholder="MM/AA" required>
                        </div>
                        <div class="form-group">
                            <label for="cardCvv">Código de Seguridad</label>
                            <div class="cvv-container">
                                <input type="text" id="cardCvv" placeholder="CVV" required>
                                <span class="cvv-info"><i class="fas fa-question-circle"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-pagar" onclick="verificarCaptchaAntesDePagar('tarjeta')">
                            <i class="fas fa-lock"></i> Pagar $<span id="montoTotalPagar">0.00</span>
                        </button>
                    </div>
                </form>

                <div class="secure-payment">
                    <i class="fas fa-lock"></i> Pago seguro encriptado SSL
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal de CAPTCHA -->
<div id="captchaModal" class="modal">
    <div class="modal-content" style="max-width: 400px;">
        <span class="close" onclick="cerrarModalCaptcha()">&times;</span>
        <h3>Verificación de Seguridad</h3>
        <div id="captchaContainer">
            <div class="captcha-image">
                <img src="captcha_image.php?<?= time() ?>" alt="CAPTCHA" id="captcha-img-pago">
                <button type="button" onclick="refreshPagoCaptcha()" title="Actualizar código">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
            <input type="text" id="captchaInputPago" placeholder="Ingresa el código" style="margin: 10px 0; padding: 8px; width: 100%;">
            <button type="button" onclick="validarCaptchaPago()" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none;">
                Verificar y Continuar con el Pago
            </button>
        </div>
    </div>
</div>

<!-- Modal de "Procesando pago" -->
<div id="procesandoPagoModal" class="modal">
    <div class="modal-content" style="text-align: center; max-width: 400px;">
        <div class="processing-content">
            <img src="../img/dakcom.png" alt="DAKCOM" class="processing-logo">
            <div class="processing-spinner">
                <div class="spinner"></div>
            </div>
            <h3>Procesando tu pago</h3>
            <p>Estamos verificando tu información de pago. Por favor espera...</p>
            <div class="processing-time">
                <i class="fas fa-clock"></i> Tiempo estimado: <span id="countdown">5</span> segundos
            </div>
        </div>
    </div>
</div>

<!-- Modal de la factura - Diseño mejorado -->
<div id="reciboModal" class="modal">
    <div class="modal-content" style="max-width: 700px;">
        <div class="modal-header">
            <h2 class="modal-title">Factura de Compra</h2>
            <span id="closeReciboModal" class="close">&times;</span>
        </div>

        <div class="invoice-header">
            <div class="invoice-logo">
                <img src="../img/dakcom.png" alt="DAKCOM">
                <div class="invoice-meta">
                    <div class="invoice-number">Factura #<span id="facturaNoRecibo"></span></div>
                    <div class="invoice-date"><span id="fechaFactura"></span> <span id="horaFactura"></span></div>
                </div>
            </div>

            <div class="invoice-customer">
                <h4>Información del Cliente</h4>
                <p><strong id="clienteRecibo"></strong></p>
                <p id="emailRecibo"></p>
                <p id="telefonoRecibo"></p>
                <p id="direccionRecibo"></p>
                <p><strong>Método de pago:</strong> <span id="metodoPagoRecibo"></span></p>
            </div>
        </div>

        <div class="invoice-products">
            <table>
                <thead>
                    <tr>
                        <th class="product-name">Producto</th>
                        <th class="product-price">Precio Unitario</th>
                        <th class="product-qty">Cantidad</th>
                        <th class="product-total">Total</th>
                    </tr>
                </thead>
                <tbody id="reciboContenido">
                    <!-- Los productos se insertarán aquí -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="total-label">TOTAL</td>
                        <td class="total-amount" id="totalRecibo">$0.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="invoice-footer">
            <div class="invoice-message">
                <p>¡Gracias por tu compra en DAKCOM!</p>
                <p>Tu pedido será procesado y enviado en un plazo de 1-3 días hábiles.</p>
            </div>
            <div class="invoice-actions">
                <button class="btn-print" onclick="window.print()">
                    <i class="fas fa-print"></i> Imprimir Factura
                </button>
                <button class="btn-close" onclick="document.getElementById('reciboModal').style.display='none'">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS Mejorados -->
<style>
    /* Estilos generales para modales */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto;
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 0;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        animation: modalFadeIn 0.3s;
    }
    .captcha-image {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 15px 0;
    padding: 10px;
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.captcha-image img {
    margin-right: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: black;
}


    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .modal-header {
        padding: 20px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h2 {
        margin: 0;
        font-size: 22px;
        color: #333;
    }

    .modal-body {
        padding: 20px;
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close:hover {
        color: #333;
    }

    /* Estilos específicos para el modal de datos del cliente */
    #datosClienteModal .modal-content {
        background: #f9f9f9;
    }

    #datosClienteModal .form-group {
        margin-bottom: 20px;
    }

    #datosClienteModal label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    #datosClienteModal input,
    #datosClienteModal textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 15px;
        transition: border 0.3s;
    }

    #datosClienteModal input:focus,
    #datosClienteModal textarea:focus {
        border-color: #3264d7;
        outline: none;
    }

    #datosClienteModal textarea {
        resize: vertical;
        min-height: 8px;
    }

    .form-row {
        display: flex;
        gap: 15px;
    }

    .form-row .form-group {
        flex: 1;
    }

    .btn-continuar {
        background-color: #3264d7;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-continuar:hover {
        background-color: #2a56c0;
    }

    /* Estilos para el modal de método de pago */
    .payment-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    #metodoPagoModal .form-group {
        margin-bottom: 15px;
    }

    #metodoPagoModal label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    #metodoPagoModal input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 15px;
    }

    .cvv-container {
        position: relative;
    }

    .cvv-info {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #777;
        cursor: help;
    }

    .btn-pagar {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 14px 20px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-pagar:hover {
        background-color: #218838;
    }

    .secure-payment {
        text-align: center;
        margin-top: 15px;
        font-size: 13px;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    /* Estilos para el modal de procesando pago */
    .processing-content {
        padding: 30px;
    }

    .processing-logo {
        width: 120px;
        margin-bottom: 20px;
    }

    .processing-spinner {
        margin: 20px 0;
    }

    .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3264d7;
        border-radius: 50%;
        margin: 0 auto;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .processing-time {
        margin-top: 20px;
        font-size: 14px;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    /* Estilos para el modal de factura */
    .invoice-header {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        border-bottom: 1px solid #eee;
    }

    .invoice-logo {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .invoice-logo img {
        width: 80px;
        height: auto;
    }

    .invoice-meta {
        font-size: 14px;
        color: #666;
    }

    .invoice-number {
        font-weight: bold;
        color: #333;
    }

    .invoice-customer {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 6px;
        max-width: 250px;
    }

    .invoice-customer h4 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 16px;
        color: #333;
    }

    .invoice-products {
        padding: 20px;
    }

    .invoice-products table {
        width: 100%;
        border-collapse: collapse;
    }

    .invoice-products th {
        text-align: left;
        padding: 12px;
        background-color: #f8f9fa;
        border-bottom: 2px solid #ddd;
        font-weight: 600;
        color: #555;
    }

    .invoice-products td {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    .product-name {
        width: 40%;
    }

    .product-price,
    .product-qty,
    .product-total {
        width: 20%;
        text-align: right;
    }

    .total-label {
        text-align: right;
        font-weight: bold;
        padding-right: 20px;
    }

    .total-amount {
        font-weight: bold;
        font-size: 18px;
        color: #3264d7;
    }

    .invoice-footer {
        padding: 20px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .invoice-message {
        color: #666;
        font-size: 14px;
    }

    .btn-print,
    .btn-close {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-print {
        background-color: #f8f9fa;
        color: #333;
        margin-right: 10px;
    }

    .btn-close {
        background-color: #6c757d;
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modal-content {
            width: 95%;
            margin: 10% auto;
        }

        .form-row {
            flex-direction: column;
        }

        .invoice-header {
            flex-direction: column;
        }

        .invoice-customer {
            max-width: 100%;
            margin-top: 15px;
        }
    }
</style>

<script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID&currency=USD"></script>

<script>
    // Variable para almacenar el método de pago temporal
let metodoPagoTemporal = '';

function verificarCaptchaAntesDePagar(metodo) {
    // Validar datos de tarjeta primero
    if (metodo === 'tarjeta') {
        const cardNumber = document.getElementById('cardNumber').value;
        const cardName = document.getElementById('cardName').value;
        const cardExpiry = document.getElementById('cardExpiry').value;
        const cardCvv = document.getElementById('cardCvv').value;

        if (!cardNumber || !cardName || !cardExpiry || !cardCvv) {
            alert('Por favor complete todos los campos de la tarjeta');
            return;
        }

        if (!/^\d{16}$/.test(cardNumber.replace(/\s/g, ''))) {
            alert('Número de tarjeta inválido (deben ser 16 dígitos)');
            return;
        }
    }

    // Guardar el método de pago para usarlo después
    metodoPagoTemporal = metodo;
    
    // Mostrar modal de CAPTCHA
    document.getElementById('captchaModal').style.display = 'block';
    
    // Generar nuevo CAPTCHA
    refreshPagoCaptcha();
}

function refreshPagoCaptcha() {
    document.getElementById('captcha-img-pago').src = 'captcha_image.php?t=' + Date.now();
    document.getElementById('captchaInputPago').value = '';
}

function validarCaptchaPago() {
    const codigoIngresado = document.getElementById('captchaInputPago').value.toUpperCase();
    
    // Verificar el CAPTCHA via AJAX
    fetch('verificar_captcha.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'codigo=' + encodeURIComponent(codigoIngresado)
    })
    .then(response => response.json())
    .then(data => {
        if (data.exito) {
            // Cerrar modal de CAPTCHA
            document.getElementById('captchaModal').style.display = 'none';
            
            // Proceder con el pago
            procesarPago(metodoPagoTemporal);
        } else {
            alert('Código CAPTCHA incorrecto. Intenta nuevamente.');
            refreshPagoCaptcha();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al verificar el CAPTCHA');
    });
}

function cerrarModalCaptcha() {
    document.getElementById('captchaModal').style.display = 'none';
}
    // Obtener la fecha y hora actual
    const fechaActual = new Date();
    const fechaFactura = fechaActual.toLocaleDateString(); // Formato de fecha
    const horaFactura = fechaActual.toLocaleTimeString(); // Formato de hora

    // Array para almacenar los productos en el carrito
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    let ultimosDigitos = '';

    // Cerrar el carrito al hacer clic en la tacha
    document.getElementById('cerrarCarrito').addEventListener('click', function() {
        document.getElementById('carritoPopup').style.display = 'none';
    });

    // Función para guardar el carrito en localStorage
    function guardarCarritoEnLocalStorage() {
        localStorage.setItem('carrito', JSON.stringify(carrito));
    }

    // Insertar la fecha y la hora en el modal
    document.getElementById('fechaFactura').innerText = fechaFactura;
    document.getElementById('horaFactura').innerText = horaFactura;

    // Función para agregar productos al carrito
    function agregarAlCarrito(producto) {
        const productoExistente = carrito.find(item => item.nombre === producto.nombre);
        if (productoExistente) {
            productoExistente.cantidad += 1;
        } else {
            producto.cantidad = 1;
            carrito.push(producto);
        }
        guardarCarritoEnLocalStorage();
        actualizarCarrito();
    }

    // Función para actualizar el contador y mostrar el contenido del carrito
    function actualizarCarrito() {
        const cartCount = document.getElementById('cartCount');
        cartCount.innerText = carrito.length > 0 ? carrito.length : '0';

        let carritoContenido = document.getElementById('carritoContenido');
        carritoContenido.innerHTML = '';
        let totalCarrito = 0;

        if (carrito.length === 0) {
            carritoContenido.innerHTML = '<p>No hay productos en el carrito.</p>';
        } else {
            carrito.forEach(producto => {
                const divProducto = document.createElement('div');
                divProducto.classList.add('producto-carrito');
                divProducto.innerHTML = `
                <img src="${producto.img}" alt="${producto.nombre}" class="producto-imagen">
                <div class="producto-info">
                    <h4>${producto.nombre}</h4>
                    <p>$${producto.precio}</p>
                    <p>Cantidad: 
                        <button class="cantidad-btn" onclick="modificarCantidad('${producto.nombre}', -1)">-</button>
                        ${producto.cantidad}
                        <button class="cantidad-btn" onclick="modificarCantidad('${producto.nombre}', 1)">+</button>
                    </p>
                    <p>Total: $${(producto.precio * producto.cantidad).toFixed(2)}</p>
                </div>
            `;
                carritoContenido.appendChild(divProducto);
                totalCarrito += producto.precio * producto.cantidad;
            });
        }

        const totalElemento = document.getElementById('total');
        totalElemento.innerText = `Total: $${totalCarrito.toFixed(2)}`;
    }

    // Función para modificar la cantidad de un producto en el carrito
    function modificarCantidad(nombreProducto, cantidad) {
        const producto = carrito.find(item => item.nombre === nombreProducto);
        if (producto) {
            if (producto.cantidad + cantidad > 0) {
                producto.cantidad += cantidad;
            } else {
                carrito = carrito.filter(item => item.nombre !== nombreProducto);
            }
        }
        guardarCarritoEnLocalStorage();
        actualizarCarrito();
    }

    // Mostrar el carrito al hacer clic en "Mi carrito"
    document.getElementById('cartButton').addEventListener('click', function() {
        let carritoDiv = document.getElementById('carritoPopup');
        carritoDiv.style.display = carritoDiv.style.display === 'block' ? 'none' : 'block';
    });

    // Función para vaciar el carrito
    function vaciarCarrito() {
        carrito = [];
        guardarCarritoEnLocalStorage();
        actualizarCarrito();
        document.getElementById('carritoPopup').style.display = 'none'; // Asegurar que el carritoPopup esté oculto
    }

    // Función para generar el recibo al pagar
    function pagarCarrito() {
        document.getElementById('carritoPopup').style.display = 'none';
        // Mostrar el modal para ingresar los datos del cliente
        document.getElementById('datosClienteModal').style.display = 'block';
    }

    // Cerrar el modal de los datos del cliente
    document.getElementById('closeClienteModal').addEventListener('click', function() {
        document.getElementById('datosClienteModal').style.display = 'none';
    });

    // Mostrar el modal para seleccionar el método de pago
    function mostrarMetodoPago() {
        // Validar los datos del cliente
        const nombreCliente = document.getElementById('nombreCliente').value;
        const emailCliente = document.getElementById('emailCliente').value;
        const telefonoCliente = document.getElementById('telefonoCliente').value;
        const direccionCliente = document.getElementById('direccionCliente').value;

        if (nombreCliente && emailCliente && telefonoCliente && direccionCliente) {
            // Calcular total para mostrar en el botón de pago
            const totalCompra = carrito.reduce((total, producto) => total + (producto.precio * producto.cantidad), 0);
            document.getElementById('montoTotalPagar').textContent = totalCompra.toFixed(2);

            // Mostrar el modal para elegir el método de pago
            document.getElementById('datosClienteModal').style.display = 'none';
            document.getElementById('metodoPagoModal').style.display = 'block';
        } else {
            alert('Por favor, complete todos los campos');
        }
    }

    // [Mantén el resto de tus funciones JavaScript existentes]
    function procesarPago(metodo) {
        // Validar datos de tarjeta si es el método
        if (metodo === 'tarjeta') {
            const cardNumber = document.getElementById('cardNumber').value;
            const cardName = document.getElementById('cardName').value;
            const cardExpiry = document.getElementById('cardExpiry').value;
            const cardCvv = document.getElementById('cardCvv').value;

            if (!cardNumber || !cardName || !cardExpiry || !cardCvv) {
                alert('Por favor complete todos los campos de la tarjeta');
                return;
            }

            // Validación básica de formato
            if (!/^\d{16}$/.test(cardNumber.replace(/\s/g, ''))) {
                alert('Número de tarjeta inválido (deben ser 16 dígitos)');
                return;
            }

            // Guardar últimos 4 dígitos para el recibo
            ultimosDigitos = cardNumber.slice(-4);
        }

        // Ocultar modal de pago
        document.getElementById('metodoPagoModal').style.display = 'none';

        // Mostrar modal de procesamiento
        document.getElementById('procesandoPagoModal').style.display = 'block';

        // Contador regresivo
        let segundos = 5;
        const countdownElement = document.getElementById('countdown');
        countdownElement.textContent = segundos;

        const intervalo = setInterval(() => {
            segundos--;
            countdownElement.textContent = segundos;

            if (segundos <= 0) {
                clearInterval(intervalo);
                // Ocultar procesamiento y mostrar factura
                document.getElementById('procesandoPagoModal').style.display = 'none';
                mostrarFactura(metodo);
            }
        }, 1000);
    }
    // Función para mostrar la factura con diseño mejorado
    function mostrarFactura(metodoPago) {
        // Obtener datos del cliente
        const nombreCliente = document.getElementById('nombreCliente').value;
        const emailCliente = document.getElementById('emailCliente').value;
        const telefonoCliente = document.getElementById('telefonoCliente').value;
        const direccionCliente = document.getElementById('direccionCliente').value;

        // Configurar información del recibo
        document.getElementById('clienteRecibo').textContent = nombreCliente;
        document.getElementById('emailRecibo').textContent = emailCliente;
        document.getElementById('telefonoRecibo').textContent = telefonoCliente;
        document.getElementById('direccionRecibo').textContent = direccionCliente;

        // Mostrar método de pago
        document.getElementById('metodoPagoRecibo').textContent = metodoPago === 'tarjeta' ?
            `Tarjeta terminada en ${ultimosDigitos}` : 'Transferencia bancaria';

        // Generar contenido de los productos
        let reciboContenido = document.getElementById('reciboContenido');
        reciboContenido.innerHTML = '';

        let totalCompra = 0;
        carrito.forEach(producto => {
            reciboContenido.innerHTML += `
            <tr>
                <td class="product-name">${producto.nombre}</td>
                <td class="product-price">$${producto.precio.toFixed(2)}</td>
                <td class="product-qty">${producto.cantidad}</td>
                <td class="product-total">$${(producto.precio * producto.cantidad).toFixed(2)}</td>
            </tr>
        `;
            totalCompra += producto.precio * producto.cantidad;
        });

        document.getElementById('totalRecibo').textContent = `$${totalCompra.toFixed(2)}`;

        // Generar número de factura
        const facturaId = 'DAK-' + Date.now();
        document.getElementById('facturaNoRecibo').textContent = facturaId;

        // Mostrar modal de factura
        document.getElementById('reciboModal').style.display = 'block';

        // Vaciar el carrito después de mostrar la factura
        carrito = [];
        guardarCarritoEnLocalStorage();
        actualizarCarrito();
    }
</script>