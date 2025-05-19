<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="footer.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #fff;
      padding: 20px;
      border: 1px solid #888;
      border-radius: 10px;
      text-align: center;
      width: 90%;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      font-family: "Ubuntu", sans-serif;
    }

    .modal-content img {
      width: 200px;
      height: 200px;
      margin-bottom: 20px;
      object-fit: contain;
    }

    .modal-content h2 {
      font-size: 3rem;
      margin-bottom: 15px;
    }

    .modal-content p {
      font-size: 2.2rem;
      margin-bottom: 20px;
    }

    .modal-content button {
      padding: 10px 20px;
      margin: 10px;
      font-size: 1.5rem;
      border: none;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .modal-content button:hover {
      background-color: #555;
    }

    .close {
      float: right;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }

    .footer section p {
      cursor: pointer;
    }

    .loading {
      font-size: 1rem;
      color: black;
      font-weight: 300;
    }
  </style>
</head>

<body>
  <div class="footer">
    <section>
      <h3>por qué comprar</h3>
      <p onclick="mostrarModal('comoComprar')">cómo comprar</p>
      <p onclick="mostrarModal('faq')">preguntas frecuentes</p>
    </section>
    <section>
      <h3>quiénes somos</h3>
      <p onclick="mostrarModal('quienesSomos')">quiénes somos</p>
      <p onclick="mostrarModal('nuestrasTiendas')">nuestras tiendas</p>
    </section>
    <section>
      <h3>Contactar</h3>
      <p onclick="mostrarModal('centroSoporte')">Centro de soporte</p>
      <p onclick="mostrarModal('contacto')">Contacto</p>
    </section>
    <section>
    <h3>comunidad</h3>
    <!-- Versión con enlace directo -->
    <a onclick="mostrarOpcionesEmpleado()" style="cursor: pointer; text-decoration: none; color: inherit;">
        <p><i class="fas fa-user-tie"></i> ¿Eres empleado? Da clic aquí</p>
    </a>
    <a href="https://www.instagram.com/dakcomweb?utm_source=qr">
        <p><i class="fab fa-facebook-square"></i>facebook</p>
    </a>
</section>
  </div>
  <div class="copy">
    <p>DakCom. Todos los derechos reservados &copy; 2024</p>
  </div>

  <!-- Modal Opciones de Empleado -->
  <div id="modalOpcionesEmpleado" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal('modalOpcionesEmpleado')">&times;</span>
      <h2>¿Qué quieres hacer?</h2>
      <button onclick="mostrarEmpleadoModal('inventario')">Administrar inventario</button>
      <button onclick="mostrarEmpleadoModal('empleados')">Administrar empleados</button>
      <button style="background-color: #3264d7; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" onclick="window.location.href='historial_pedidos.php'">Historial</button>
    </div>
  </div>

  <!-- Modal de empleado -->
  <div id="empleadoModal" class="modal">
    <div class="modal-content">
      <img src="../img/dakcom.png" alt="Logo DakCom" />
      <h2>Bienvenido LocalHost</h2>
      <p>Estamos cargando tu sesión...</p>
      <p class="loading">Redirigiendo en 5 segundos...</p>
    </div>
  </div>

  <!-- Otros modales -->
  <div id="comoComprarModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal('comoComprarModal')">&times;</span>
      <h2>Cómo comprar</h2>
      <p>1: Busca el producto ideal...<br>2: Selecciona "Agregar al carrito"...<br>3: Click en "Mi carrito"...<br>4: Llena el formulario...<br>5: Paga con PayPal.</p>
    </div>
  </div>
  <div id="faqModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal('faqModal')">&times;</span>
      <h2>Preguntas frecuentes</h2>
      <p>¿Tiempo de entrega? 1-2 semanas<br>¿Método de pago? Solo PayPal<br>¿Tienda física? No</p>
    </div>
  </div>
  <div id="quienesSomosModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal('quienesSomosModal')">&times;</span>
      <h2>Quiénes somos</h2>
      <p>Venta de componentes...<br>Misión, visión, objetivo...</p>
    </div>
  </div>
  <div id="nuestrasTiendasModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal('nuestrasTiendasModal')">&times;</span>
      <h2>Nuestras tiendas</h2>
      <p>Solo tienda en línea.</p>
    </div>
  </div>
  <div id="centroSoporteModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal('centroSoporteModal')">&times;</span>
      <h2>Centro de soporte</h2>
      <p>Estamos para ayudarte.</p>
    </div>
  </div>
  <div id="contactoModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal('contactoModal')">&times;</span>
      <h2>Contacto</h2>
      <p>Escríbenos a <a href="mailto:contacto@dakcom.com">contacto@dakcom.com</a></p>
      <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram DakCom" style="width: 50px; height: 50px;" />
    </div>
  </div>

  <script>

    function verificarAccesoEmpleado() {
    // Forzar nueva verificación cada vez
    fetch('reset_captcha.php').then(() => {
        window.location.href = 'antibot.php?redirect=empleados';
    });
}
    function mostrarOpcionesEmpleado() {
      document.getElementById("modalOpcionesEmpleado").style.display = "flex";
    }

    function mostrarEmpleadoModal(opcion) {
      document.getElementById("modalOpcionesEmpleado").style.display = "none";
      const modal = document.getElementById("empleadoModal");
      modal.style.display = "flex";

      setTimeout(() => {
        if (opcion === "empleados") {
          verificarAccesoEmpleado();
          window.location.href = "empleados.php";
        } else {
          verificarAccesoEmpleado();
          window.location.href = "surtir.php";
        }
      }, 5000);
    }

    function mostrarModal(modalId) {
      document.getElementById(modalId + "Modal").style.display = "flex";
    }

    function cerrarModal(modalId) {
      document.getElementById(modalId).style.display = "none";
    }

    // Cerrar cualquier modal al hacer clic fuera
    window.onclick = function (event) {
      const modals = document.querySelectorAll(".modal");
      modals.forEach((modal) => {
        if (event.target === modal) {
          modal.style.display = "none";
        }
      });
    };
  </script>
</body>

</html>
