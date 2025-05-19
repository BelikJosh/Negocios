<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Archivos_css/normalize.css">
  <link rel="icon" type="image/png" href="../img/icono.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Estado de Productos Surtidos</title>
  <style>
    html {
      font-size: 62.5%;
      box-sizing: border-box;
      scroll-padding-top: 0rem;
    }

    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    body {
      font-family: "Rubik", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
      color: #000000;
      font-size: 2rem;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    body.overflow-hidden {
      overflow: hidden;
    }

    p {
      color: #000000;
      line-height: 1.5;
    }

    .contenedor {
      width: 100%;
      max-width: 120rem;
      margin: 0 auto;
      padding: 0 2rem;
    }

    a {
      text-decoration: none;
    }

    h1,
    h2,
    h3 {
      margin: 0 0 5rem 0;
      font-weight: 900;
    }

    h1 {
      font-size: 4rem;
    }

    h2 {
      font-size: 4.6rem;
    }

    h3 {
      font-size: 6rem;
      text-align: center;
    }

    img {
      max-width: 100%;
      width: 100%;
      height: auto;
      display: block;
    }

    body>section {
      padding: 10rem 0;
    }

    .header {
      background: linear-gradient(to right, #ADD8E6, #00008B);
    }

    @media (min-width: 768px) {
      .header.fixed {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        box-shadow: 0.1rem 0.2rem 0.3rem #333;
      }
    }

    .header .contenido-header {
      padding: 2rem;
    }

    @media (min-width: 768px) {
      .header .contenido-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
    }

    .header h1 {
      color: #FFFFFF;
      text-align: center;
    }

    @media (min-width: 768px) {
      .header h1 {
        text-align: left;
        margin: 0;
      }
    }

    .navegacion-principal {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 2rem;
    }

    @media (min-width: 768px) {
      .navegacion-principal {
        flex-direction: row;
      }
    }

    .navegacion-principal a {
      color: #FFFFFF;
      font-size: 2.4rem;
    }

    .navegacion-principal a:hover,
    .navegacion-principal a.active {
      color: #fdda00;
    }

    .icon {
      width: 10%;
      height: 10%;
    }

    .form_buscar {
      display: flex;
      gap: 1rem;
      margin-top: 12px;
    }

    .busqueda {
      flex: 1;
      padding: 1rem;
      font-size: 1.6rem;
      border: 1px solid #dddddd;
      border-radius: 0.5rem;
    }

    .filtro {
      padding: 1rem;
      font-size: 1.6rem;
      border: 1px solid #dddddd;
      border-radius: 0.5rem;
    }

    .btn_buscar {
      background: linear-gradient(to right, #ADD8E6, #00008B);
      color: #ffffff;
      border: none;
      padding: 1rem 2rem;
      font-size: 1.6rem;
      border-radius: 0.5rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn_buscar:hover {
      background-color: #1a5a8a;
    }

    .tabla-contenedor {
      width: 100%;
      overflow-x: auto;
      margin: 2rem 0;
      border-radius: 1rem;
      box-shadow: 0 0 2rem rgba(0, 0, 0, 0.1);
    }

    .tabla-inventario {
      width: 100%;
      border-collapse: collapse;
      font-size: 1.6rem;
    }

    .tabla-inventario thead tr {
      background: linear-gradient(to right, #ADD8E6, #00008B);
      color: #ffffff;
      text-align: left;
      font-weight: bold;
    }

    .tabla-inventario th,
    .tabla-inventario td {
      padding: 1.5rem;
    }

    .tabla-inventario th {
      font-size: 2.5rem;
      text-transform: uppercase;
      text-align: center;
    }

    .tabla-inventario tbody tr {
      border-bottom: 1px solid #dddddd;
      transition: background-color 0.3s ease;
    }

    .tabla-inventario tbody tr:nth-of-type(even) {
      background-color: #f9f9f9;
    }

    .tabla-inventario tbody tr:last-of-type {
      border-bottom: 2px solid #2885C0;
    }

    .tabla-inventario tbody tr:hover {
      background-color: #e0f7ff;
    }

    .tabla-inventario td {
      color: #333333;
      font-size: 1.6rem;
    }

    .tabla-inventario td:nth-child(1) {
      width: 15%;
      font-size: 2rem;
    }

    .tabla-inventario td:nth-child(2),
    .tabla-inventario td:nth-child(3),
    .tabla-inventario td:nth-child(4),
    .tabla-inventario td:nth-child(5),
    .tabla-inventario td:nth-child(6),
    .tabla-inventario td:nth-child(7) {
      width: auto;
      font-size: 2rem;
      text-align: center;
    }

    @media (max-width: 767px) {
      .tabla-contenedor {
        overflow-x: visible;
      }

      .tabla-inventario {
        min-width: 100%;
      }

      .tabla-inventario thead {
        display: none;
      }

      .tabla-inventario tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        background-color: #f9f9f9;
      }

      .tabla-inventario tbody tr:hover {
        background-color: #e0f7ff;
      }

      .tabla-inventario td {
        display: block;
        text-align: right;
        font-size: 1.4rem;
        padding: 0.5rem 1rem;
        border-bottom: 1px solid #ddd;
      }

      .tabla-inventario td:last-child {
        border-bottom: none;
      }

      .tabla-inventario td::before {
        content: attr(data-label);
        float: left;
        font-weight: bold;
        text-transform: uppercase;
        color: #333;
      }
    }

    .tabla-contenedor {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .tabla-contenedor.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .tabla-inventario td:nth-child(4) {
      width: 180px;
    }

    .estado-preparando {
      color: #007bff;
    }

    .estado-en-camino {
      color: #ffc107;
    }

    .estado-entregado {
      color: #28a745;
    }

    .estado-desconocido {
      color: #6c757d;
    }

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
    }

    .modal-contenido {
      background-color: #fff;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .cerrar {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .cerrar:hover {
      color: #000;
    }

    .modal-email {
      display: none;
      position: fixed;
      z-index: 1001;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-email-contenido {
      background-color: #fefefe;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
    }

    .form-group textarea {
      height: 150px;
      resize: vertical;
    }

    .btn-enviar {
      background: linear-gradient(to right, #ADD8E6, #00008B);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .btn-enviar:hover {
      opacity: 0.9;
    }

    .btn-email {
      background: linear-gradient(to right, #ADD8E6, #00008B);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 15px;
    }

    .btn-email:hover {
      opacity: 0.9;
    }

    .mensaje-exito {
      color: #28a745;
      margin-top: 10px;
      display: none;
    }

    .mensaje-error {
      color: #dc3545;
      margin-top: 10px;
      display: none;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="contenedor contenido-header">
      <img class="icon" src="../img/dakcom.png" width="100px" alt="Logo DakCom">
      <h1>Estado de Proveedores</h1>
      <nav class="navegacion-principal">
        <a href="surtir.php">Surtir Mercancía</a>
        <a href="index.php">Inicio</a>
      </nav>
    </div>
  </header>

  <main class="contenedor">
    <!-- Contenedor de la tabla -->
    <div class="tabla-contenedor">
      <table class="tabla-inventario">
        <thead>
          <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Cantidad</th>
            <th>Estado de Envío</th>
            <th>Fecha del Pedido</th>
            <th>Costo del Pedido</th>
          </tr>
        </thead>
        <tbody id="tabla-body">
          <!-- Aquí se cargarán los resultados -->
        </tbody>
      </table>
    </div>
  </main>

  <!-- Modal para detalles del pedido -->
  <div id="modalDetalles" class="modal">
    <div class="modal-contenido">
      <span class="cerrar">&times;</span>
      <h2>Detalles del Pedido</h2>
      <p><strong>ID del Pedido:</strong> <span id="detalleId"></span></p>
      <p><strong>Producto del Pedido:</strong> <span id="detalleProducto"></span></p>
      <p><strong>Cantidad Pedida:</strong> <span id="detalleCantidad"></span></p>
      <p><strong>Costo Total del Pedido:</strong> <span id="detallePrecio"></span></p>
      <p><strong>Fecha En Que Se Generó El Pedido:</strong> <span id="detalleFecha"></span></p>
      <p><strong>Estado del Envío:</strong> <span id="detalleEstado"></span></p>
      <p><strong>Categoría del Producto:</strong> <span id="detalleCategoria"></span></p>
      <button id="btnEnviarEmail" class="btn-email">Enviar Correo Electrónico</button>
    </div>
  </div>

  <!-- Modal para enviar correo electrónico -->
  <div id="modalEmail" class="modal-email">
    <div class="modal-email-contenido">
      <span class="cerrar cerrar-email">&times;</span>
      <h2>Enviar Correo Electrónico</h2>
      <form id="formEmail" action="enviar_email.php" method="POST">
        <div class="form-group">
          <label for="correo">Destinatario:</label>
          <input type="email" id="correo" name="correo" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje:</label>
          <textarea id="mensaje" name="mensaje" required></textarea>
        </div>
        <input type="hidden" id="asunto" name="asunto" value="Consulta sobre pedido">
        <button type="submit" class="btn-enviar">Enviar Correo</button>
        <div id="mensajeExito" class="mensaje-exito">Correo enviado exitosamente!</div>
        <div id="mensajeError" class="mensaje-error">Error al enviar el correo. Por favor intente nuevamente.</div>
      </form>
    </div>
  </div>

  <script>
    // Función para formatear la fecha en DD/MM/AA y la hora en HH:MM
    function formatearFecha(fechaISO) {
      const fecha = new Date(fechaISO);
      const dia = String(fecha.getDate()).padStart(2, '0');
      const mes = String(fecha.getMonth() + 1).padStart(2, '0'); // Los meses comienzan en 0
      const anio = String(fecha.getFullYear()).slice(-2); // Solo los últimos dos dígitos del año
      const horas = String(fecha.getHours()).padStart(2, '0');
      const minutos = String(fecha.getMinutes()).padStart(2, '0');

      return {
        fecha: `${dia}/${mes}/${anio}`,
        hora: `${horas}:${minutos}`
      };
    }

    function cargarDatos() {
      fetch('buscar.php')
        .then(response => {
          if (!response.ok) {
            throw new Error('Error en la red');
          }
          return response.json();
        })
        .then(data => {
          const tbody = document.getElementById('tabla-body');
          tbody.innerHTML = '';

          if (data.length === 0 || data.mensaje) {
            tbody.innerHTML = '<tr><td colspan="6">No se encontraron resultados.</td></tr>';
          } else {
            data.forEach(item => {
              // Validar que los datos sean seguros antes de mostrarlos
              const sanitize = (str) => {
                const div = document.createElement('div');
                div.textContent = str;
                return div.innerHTML;
              };

              let estadoEmoji = '';
              let estadoClase = '';
              switch (item.Estado_Envio) {
                case 'Preparando':
                  estadoEmoji = '📦';
                  estadoClase = 'estado-preparando';
                  break;
                case 'En Camino':
                  estadoEmoji = '🚚';
                  estadoClase = 'estado-en-camino';
                  break;
                case 'Entregado':
                  estadoEmoji = '✅';
                  estadoClase = 'estado-entregado';
                  break;
                default:
                  estadoEmoji = '❓';
                  estadoClase = 'estado-desconocido';
              }

              // Formatear la fecha y la hora
              const { fecha, hora } = formatearFecha(item.Fecha_Pedido);

              const row = document.createElement('tr');
              row.innerHTML = `
                <td>${sanitize(item.ID_Pedido)}</td>
                <td>${sanitize(item.Empresa_Encargada)}</td>
                <td>${sanitize(item.Cantidad_Pedida)}</td>
                <td class="${estadoClase}">${estadoEmoji} ${sanitize(item.Estado_Envio)}</td>
                <td>${sanitize(fecha)} ${sanitize(hora)}</td>
                <td>$${sanitize(item.Precio_Total)}</td>
              `;
              row.addEventListener('click', () => mostrarDetalles(item));
              tbody.appendChild(row);
            });
          }
        })
        .catch(error => {
          console.error('Error:', error);
          document.getElementById('tabla-body').innerHTML = '<tr><td colspan="6">Error al cargar los datos.</td></tr>';
        });
    }

    function mostrarDetalles(item) {
      const modal = document.getElementById('modalDetalles');
      const detalleId = document.getElementById('detalleId');
      const detalleProducto = document.getElementById('detalleProducto');
      const detalleCantidad = document.getElementById('detalleCantidad');
      const detallePrecio = document.getElementById('detallePrecio');
      const detalleFecha = document.getElementById('detalleFecha');
      const detalleEstado = document.getElementById('detalleEstado');
      const detalleCategoria = document.getElementById('detalleCategoria');

      // Función para sanitizar el contenido antes de mostrarlo
      const sanitize = (str) => {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
      };

      // Formatear la fecha y la hora
      const { fecha, hora } = formatearFecha(item.Fecha_Pedido);

      detalleId.textContent = sanitize(item.ID_Pedido);
      detalleProducto.textContent = sanitize(item.Producto);
      detalleCantidad.textContent = sanitize(item.Cantidad_Pedida);
      detallePrecio.textContent = `$${sanitize(item.Precio_Total)}`;
      detalleFecha.textContent = `${sanitize(fecha)} ${sanitize(hora)}`;
      detalleEstado.textContent = sanitize(item.Estado_Envio);
      detalleCategoria.textContent = sanitize(item.Categoria);

      // Configurar el botón de enviar email
      const btnEnviarEmail = document.getElementById('btnEnviarEmail');
      btnEnviarEmail.onclick = function() {
        mostrarFormularioEmail(item);
      };

      modal.style.display = 'block';
    }

    function mostrarFormularioEmail(item) {
      const modalDetalles = document.getElementById('modalDetalles');
      const modalEmail = document.getElementById('modalEmail');
      
      // Cerrar el modal de detalles
      modalDetalles.style.display = 'none';
      
      // Configurar valores predeterminados en el formulario de email
      document.getElementById('correo').value = '';
      
      // Crear un mensaje predeterminado con los detalles del pedido
      const { fecha, hora } = formatearFecha(item.Fecha_Pedido);
      const mensaje = `Estimado proveedor,\n\n` +
                     `Le escribimos respecto al pedido #${item.ID_Pedido} con los siguientes detalles:\n\n` +
                     `- Producto: ${item.Producto}\n` +
                     `- Cantidad: ${item.Cantidad_Pedida}\n` +
                     `- Fecha del pedido: ${fecha} ${hora}\n` +
                     `- Estado actual: ${item.Estado_Envio}\n\n` +
                     `Por favor, confirme la recepción de este correo y cualquier actualización sobre el estado del pedido.\n\n` +
                     `Atentamente,\nEl equipo de compras`;
      
      document.getElementById('mensaje').value = mensaje;
      document.getElementById('asunto').value = `Consulta sobre pedido #${item.ID_Pedido}`;
      
      // Mostrar el modal de email
      modalEmail.style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', () => {
      cargarDatos();

      // Agregar efecto de animación
      setTimeout(() => {
        document.querySelector('.tabla-contenedor').classList.add('visible');
      }, 200);

      // Cerrar modal al hacer clic en la 'x'
      const modal = document.getElementById('modalDetalles');
      const span = document.getElementsByClassName('cerrar')[0];
      span.onclick = function() {
        modal.style.display = 'none';
      }

      // Cerrar modal de email
      const modalEmail = document.getElementById('modalEmail');
      const spanEmail = document.getElementsByClassName('cerrar-email')[0];
      spanEmail.onclick = function() {
        modalEmail.style.display = 'none';
      }

      // Cerrar modales al hacer clic fuera del contenido
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = 'none';
        }
        if (event.target == modalEmail) {
          modalEmail.style.display = 'none';
        }
      }

      // Manejar el envío del formulario de email
      const formEmail = document.getElementById('formEmail');
      formEmail.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const mensajeExito = document.getElementById('mensajeExito');
        const mensajeError = document.getElementById('mensajeError');
        
        // Ocultar mensajes anteriores
        mensajeExito.style.display = 'none';
        mensajeError.style.display = 'none';
        
        // Validar el correo electrónico
        const correo = document.getElementById('correo').value;
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        
        if (!emailRegex.test(correo)) {
          mensajeError.textContent = 'Por favor ingrese un correo electrónico válido';
          mensajeError.style.display = 'block';
          return;
        }
        
        // Crear FormData para enviar los datos del formulario
        const formData = new FormData(this);
        
        // Enviar el formulario usando Fetch API
        fetch(this.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest' // Para identificar solicitudes AJAX en el servidor
          }
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Error en la respuesta del servidor');
          }
          return response.text();
        })
        .then(text => {
          // Verificar si la respuesta contiene el mensaje de éxito
          if (text.includes("Mensaje enviado con éxito")) {
            mensajeExito.style.display = 'block';
            // Limpiar el formulario después de 2 segundos
            setTimeout(() => {
              formEmail.reset();
              mensajeExito.style.display = 'none';
              modalEmail.style.display = 'none';
            }, 2000);
          } else {
            throw new Error('Error en el servidor');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          mensajeError.textContent = 'Error al enviar el correo. Por favor intente nuevamente.';
          mensajeError.style.display = 'block';
        });
      });
    });
  </script>
</body>

</html>