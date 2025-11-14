<?php
include('db_conection.php');

$conn = OpenCon();

// Procesar eliminación de empleado
if (isset($_POST['eliminar_empleado'])) {
    $id = $_POST['id_empleado'];
    $query = "DELETE FROM empleados WHERE id_empleado = $id";
    mysqli_query($conn, $query);
}

// Procesar actualización de puesto
if (isset($_POST['actualizar_puesto'])) {
    $id = $_POST['id_empleado'];
    $puesto = $_POST['puesto'];
    $salario = $_POST['salario'];
    $puntualidad = $_POST['puntualidad'];

    $query = "UPDATE empleados SET puesto = '$puesto', salario = $salario, puntualidad = $puntualidad WHERE id_empleado = $id";
    mysqli_query($conn, $query);
}

// Procesar nuevo empleado
if (isset($_POST['nuevo_empleado'])) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $puesto = $_POST['puesto'];
    $fecha_ingreso = date('Y-m-d');
    $salario = $_POST['salario'];
    $puntualidad = $_POST['puntualidad'];

    // Procesar imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "../img/empleados/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
        $foto = basename($_FILES["foto"]["name"]); // Asegúrate de tener esta línea
    } else {
        $foto = 'default.png';
    }

    $query = "INSERT INTO empleados (nombre, edad, puesto, fecha_ingreso, salario, puntualidad, foto) 
              VALUES ('$nombre', $edad, '$puesto', '$fecha_ingreso', $salario, $puntualidad, '$foto')";
    mysqli_query($conn, $query);
}

$query = "SELECT id_empleado, nombre, edad, puesto FROM empleados";
$resultado = mysqli_query($conn, $query);
?>

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
    <title>Lista de Empleados - DakCom</title>
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

        /* Estilos de navegación actualizados */
        .header {
            background: linear-gradient(to right, #ADD8E6, #00008B);
            position: fixed;
        }

        @media (min-width: 768px) {
            .header.fixed {
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
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
                padding-top: 2rem;
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

        .navegacion-principal a:hover {
            color: #fdda00;
        }

        .icon {
            width: 10%;
            height: 10%;
        }

        /* Resto de estilos */
        main.contenedor {
            padding-top: 10rem;
            border-radius: 10px;

        }


        .tabla-contenedor {
            margin-bottom: 2rem;
            border-radius: 10px;
            background: #fff;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            position: relative;
            /* Para que el contenedor de la tabla no se superponga */
            overflow: auto;
            /* Permitir desplazamiento */
            max-height: 60vh;
            /* Altura máxima para el contenedor de la tabla */
        }

        .tabla-contenedor.mostrar {
            opacity: 1;
            transform: translateY(0);
        }

        .tabla-inventario {
            width: 100%;
            border-collapse: collapse;
            font-size: 1.6rem;
        }

        .tabla-inventario thead {
            background: linear-gradient(to right, #ADD8E6, #00008B);
            color: white;
            text-transform: uppercase;
        }

        .tabla-inventario th,
        .tabla-inventario td {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .tabla-inventario tbody tr {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .tabla-inventario tbody tr:hover {
            background-color: #f1f8ff;
        }

        .tabla-inventario th {
            font-size: 2rem;
        }

        .tabla-inventario td {
            font-size: 1.8rem;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 3rem;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .close {
            color: #aaa;
            position: absolute;
            top: 1rem;
            right: 2rem;
            font-size: 3rem;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        .modal-header {
            display: flex;
            align-items: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #eee;
        }

        .modal-foto {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 3rem;
            border: 3px solid #ADD8E6;
        }

        .modal-titulo {
            font-size: 2.5rem;
            margin: 0;
            color: #00008B;
        }

        .modal-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .modal-info {
            margin-bottom: 1.5rem;
        }

        .modal-label {
            font-weight: bold;
            color: #00008B;
            display: block;
            margin-bottom: 0.5rem;
        }

        .modal-value {
            background-color: #f5f5f5;
            padding: 1rem;
            border-radius: 5px;
            border-left: 4px solid #ADD8E6;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #eee;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1.6rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #00008B;
            color: white;
        }

        .btn-primary:hover {
            background-color: #00006B;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .acciones {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 2rem;
        }
        .email {
            display: flex;
            justify-content: flex-start;
            margin-top: -7rem;
        }

        .btn-alta {
            background: linear-gradient(to right, #00008B, #1E90FF);
            color: white;
            padding: 1.5rem 3rem;
            font-size: 1.8rem;
            font-weight: 700;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-transform: uppercase;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-alta:hover {
            background: linear-gradient(to right, #1E90FF, #00008B);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .btn-email {
            background: linear-gradient(to right,rgb(139, 0, 139), #1E90FF);
            color: white;
            padding: 1.5rem 3rem;
            font-size: 1.8rem;
            font-weight: 700;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-transform: uppercase;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-email:hover {
            background: linear-gradient(to right, rgb(139,0,139), #1E90FF);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .modalEmail {
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: opacity 0.3s ease;
}

.modalEmail-content {
  background-color: #fff;
  padding: 25px;
  border-radius: 10px;
  width: 500px;
  max-height: 80vh;
  overflow-y: auto;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
  from {
    transform: translateY(-50px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.close {
  float: right;
  font-size: 30px;
  cursor: pointer;
  color: #555;
  transition: color 0.3s ease;
}

.close:hover {
  color: #f44336;
}

h2 {
  color: #333;
  font-size: 24px;
  margin-bottom: 15px;
  text-align: center;
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border-radius: 5px;
  border: 1px solid #ddd;
  font-size: 16px;
  box-sizing: border-box;
}

textarea {
  height: 120px;
  resize: none;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
}

th, td {
  padding: 12px;
  border: 1px solid #ddd;
  text-align: left;
  font-size: 16px;
}

th {
  background-color: #f2f2f2;
}

tbody tr:hover {
  background-color: #f1f1f1;
}

#buscarCorreo {
  padding: 10px;
  margin-bottom: 15px;
  width: calc(100% - 22px);
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
}



        /* Formulario styles */
        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #00008B;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            font-size: 1.6rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #00008B;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 139, 0.25);
        }

        .form-row {
            display: flex;
            gap: 2rem;
        }

        .form-col {
            flex: 1;
        }

        /* Modal de confirmación */
        .confirm-modal {
            text-align: center;
        }

        .confirm-modal h3 {
            font-size: 2.4rem;
            margin-bottom: 2rem;
            color: #00008B;
        }

        .confirm-modal p {
            margin-bottom: 3rem;
            font-size: 1.8rem;
        }

        .confirm-actions {
            display: flex;
            justify-content: center;
            gap: 2rem;
        }
    </style>
</head>

<body>
    <header class="header fixed">
        <div class="contenedor contenido-header">
            <img class="icon" src="../img/dakcom.png" alt="Logo DakCom">
            <h1>Empleados de DakCom</h1>
            <nav class="navegacion-principal">
                <a href="estado_prov.php" class="active">Estado de Envíos</a>
                <a href="index.php">Inicio</a>
            </nav>
        </div>
    </header>

    <main class="contenedor">
        <div class="tabla-contenedor">
            <table class="tabla-inventario">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Puesto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr data-id='{$row['id_empleado']}'>";
                        echo "<td>{$row['id_empleado']}</td>";
                        echo "<td>{$row['nombre']}</td>";
                        echo "<td>{$row['edad']}</td>";
                        echo "<td>{$row['puesto']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="acciones">
            <button id="btnAlta" class="btn-alta">Alta de Empleado</button>
        </div>
        <div class="email">
            <button id="btnEmail" class="btn-email">Enviar Email a clientes</button>
        </div>
       


    </main>

    <!-- Modal -->
    <div id="emailModal" class="modalEmail" style="display:none;">
  <div class="modal-content">
    <span class="close" id="closeModal">&times;</span>
    <h2>Enviar Email a Usuario</h2>

    <!-- Campo para buscar correo -->
    <input type="text" id="buscarCorreo" placeholder="Buscar por correo..." onkeyup="filtrarTabla()">

    <!-- Tabla de usuarios -->
    <table id="tablaUsuarios">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Seleccionar</th>
        </tr>
      </thead>
      <tbody id="tablaBody">
        <!-- Se llenará dinámicamente -->
      </tbody>
    </table>

    <!-- Formulario de email -->
    <form id="formEmail" method="POST" action="enviar_correo.php">
      <input type="email" name="correo" id="correo" placeholder="Correo seleccionado" required readonly>
      <textarea name="mensaje" placeholder="Escribe el mensaje..." required></textarea>
      <button type="submit">Enviar</button>
    </form>
  </div>
</div>


    <!-- Modal de Detalles -->
    <div id="detalleModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header">
                <img id="modalFoto" src="" alt="Foto del empleado" class="modal-foto">
                <h2 id="modalNombre" class="modal-titulo"></h2>
            </div>
            <div class="modal-body">
                <div class="modal-info">
                    <span class="modal-label">ID:</span>
                    <div id="modalId" class="modal-value"></div>
                </div>
                <div class="modal-info">
                    <span class="modal-label">Edad:</span>
                    <div id="modalEdad" class="modal-value"></div>
                </div>
                <div class="modal-info">
                    <span class="modal-label">Puesto:</span>
                    <div id="modalPuesto" class="modal-value"></div>
                </div>
                <div class="modal-info">
                    <span class="modal-label">Fecha de Ingreso:</span>
                    <div id="modalFechaIngreso" class="modal-value"></div>
                </div>
                <div class="modal-info">
                    <span class="modal-label">Puntualidad:</span>
                    <div id="modalPuntualidad" class="modal-value"></div>
                </div>
                <div class="modal-info">
                    <span class="modal-label">Salario:</span>
                    <div id="modalSalario" class="modal-value"></div>
                </div>
            </div>
            <div class="modal-actions">
                <button id="btnEliminar" class="btn btn-danger">Eliminar Empleado</button>
                <button id="btnPromover" class="btn btn-primary">Subir de Puesto</button>
                <button id="btnCerrar" class="btn btn-secondary">Cerrar</button>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
    <div id="confirmModal" class="modal">
        <div class="modal-content confirm-modal">
            <h3>¿Está seguro de eliminar este empleado?</h3>
            <p>Esta acción no se puede deshacer y se perderán todos los datos del empleado.</p>
            <div class="confirm-actions">
                <form id="deleteForm" method="post">
                    <input type="hidden" name="id_empleado" id="deleteId">
                    <button type="submit" name="eliminar_empleado" class="btn btn-danger">Eliminar</button>
                    <button type="button" id="btnCancelar" class="btn btn-secondary">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Promoción -->
    <div id="promocionModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Actualizar Puesto</h2>
            <form id="promocionForm" method="post">
                <input type="hidden" name="id_empleado" id="promocionId">
                <div class="form-group">
                    <label for="nuevoPuesto" class="form-label">Nuevo Puesto:</label>
                    <input type="text" id="nuevoPuesto" name="puesto" class="form-control" required>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="nuevoSalario" class="form-label">Nuevo Salario:</label>
                        <input type="number" id="nuevoSalario" name="salario" class="form-control" step="0.01" required>
                    </div>
                    <div class="form-col">
                        <label for="nuevaPuntualidad" class="form-label">Puntualidad (%):</label>
                        <input type="number" id="nuevaPuntualidad" name="puntualidad" class="form-control" min="0" max="100" required>
                    </div>
                </div>
                <div class="modal-actions">
                    <button type="submit" name="actualizar_puesto" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" id="btnCancelarPromocion" class="btn btn-secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    

    
    <!-- Modal de Alta de Empleado -->
    <div id="altaModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Alta de Nuevo Empleado</h2>
        <form id="altaForm" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edad" class="form-label">Edad:</label>
                        <input type="number" id="edad" name="edad" class="form-control" min="18" max="99" required>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-group">
                        <label for="foto" class="form-label">Foto:</label>
                        <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="puesto" class="form-label">Puesto:</label>
                        <input type="text" id="puesto" name="puesto" class="form-control" required>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-group">
                        <label for="salario" class="form-label">Salario:</label>
                        <input type="number" id="salario" name="salario" class="form-control" step="0.01" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="puntualidad" class="form-label">Puntualidad (%):</label>
                <input type="number" id="puntualidad" name="puntualidad" class="form-control" min="0" max="100" required>
            </div>
            <div class="modal-actions">
                <button type="submit" name="nuevo_empleado" class="btn btn-primary">Guardar Empleado</button>
                <button type="button" id="btnCancelarAlta" class="btn btn-secondary">Cancelar</button>
            </div>
        </form>
    </div>
</div>

    <script>
        document.getElementById("btnEmail").onclick = function () {
  document.getElementById("emailModal").style.display = "flex";
  cargarUsuarios();
};

document.getElementById("closeModal").onclick = function () {
  document.getElementById("emailModal").style.display = "none";
};

function filtrarTabla() {
  const input = document.getElementById("buscarCorreo").value.toLowerCase();
  const rows = document.querySelectorAll("#tablaBody tr");
  rows.forEach(row => {
    const email = row.cells[1].innerText.toLowerCase();
    row.style.display = email.includes(input) ? "" : "none";
  });
}

function cargarUsuarios() {
  fetch('buscar_usuarios.php')
    .then(res => res.json())
    .then(data => {
      const body = document.getElementById("tablaBody");
      body.innerHTML = "";
      data.forEach(user => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${user.Nombre}</td>
          <td>${user.Email}</td>
          <td><button type="button" onclick="seleccionarCorreo('${user.Email}')">Seleccionar</button></td>
        `;
        body.appendChild(row);
      });
    });
}

function seleccionarCorreo(correo) {
  document.getElementById("correo").value = correo;
}
        document.addEventListener("DOMContentLoaded", function() {
            // Efecto de entrada
            document.querySelector(".tabla-contenedor").classList.add("mostrar");

            // Variables para los modales
            const detalleModal = document.getElementById("detalleModal");
            const confirmModal = document.getElementById("confirmModal");
            const promocionModal = document.getElementById("promocionModal");
            const altaModal = document.getElementById("altaModal");
            const btnAlta = document.getElementById("btnAlta");
            const btnCerrar = document.getElementById("btnCerrar");
            const btnCancelar = document.getElementById("btnCancelar");
            const btnCancelarPromocion = document.getElementById("btnCancelarPromocion");
            const btnCancelarAlta = document.getElementById("btnCancelarAlta");
            const closeButtons = document.getElementsByClassName("close");

            // Cargar datos del empleado cuando se hace clic en una fila
            const filas = document.querySelectorAll(".tabla-inventario tbody tr");
            filas.forEach(fila => {
                fila.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    cargarDatosEmpleado(id);
                    detalleModal.style.display = "block";
                });
            });

            // Función para cargar datos del empleado
            function cargarDatosEmpleado(id) {
                fetch(`get_empleado.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("modalId").textContent = data.id_empleado;
                        document.getElementById("modalNombre").textContent = data.nombre;
                        document.getElementById("modalEdad").textContent = data.edad;
                        document.getElementById("modalPuesto").textContent = data.puesto;
                        document.getElementById("modalFechaIngreso").textContent = data.fecha_ingreso;
                        document.getElementById("modalPuntualidad").textContent = `${data.puntualidad}%`;
                        document.getElementById("modalSalario").textContent = `$${parseFloat(data.salario).toFixed(2)}`;
                        document.getElementById("modalFoto").src = `../img/empleados/${data.foto}`;
                        // Configurar botones
                        document.getElementById("deleteId").value = data.id_empleado;
                        document.getElementById("promocionId").value = data.id_empleado;
                        document.getElementById("nuevoPuesto").value = data.puesto;
                        document.getElementById("nuevoSalario").value = data.salario;
                        document.getElementById("nuevaPuntualidad").value = data.puntualidad;
                    });
            }

            // Botón Eliminar
            document.getElementById("btnEliminar").addEventListener("click", function() {
                detalleModal.style.display = "none";
                confirmModal.style.display = "block";
            });

            // Botón Promover
            document.getElementById("btnPromover").addEventListener("click", function() {
                detalleModal.style.display = "none";
                promocionModal.style.display = "block";
            });

            // Botón Alta
            btnAlta.addEventListener("click", function() {
                altaModal.style.display = "block";
            });

            // Cerrar modales
            btnCerrar.addEventListener("click", function() {
                detalleModal.style.display = "none";
            });

            btnCancelar.addEventListener("click", function() {
                confirmModal.style.display = "none";
                detalleModal.style.display = "block";
            });

            btnCancelarPromocion.addEventListener("click", function() {
                promocionModal.style.display = "none";
                detalleModal.style.display = "block";
            });

            btnCancelarAlta.addEventListener("click", function() {
                altaModal.style.display = "none";
            });

            // Cerrar con la X
            for (let i = 0; i < closeButtons.length; i++) {
                closeButtons[i].addEventListener("click", function() {
                    this.closest(".modal").style.display = "none";
                });
            }

            // Cerrar al hacer clic fuera del modal
            window.addEventListener("click", function(event) {
                if (event.target.classList.contains("modal")) {
                    event.target.style.display = "none";
                }
            });
        });
        const fotoInput = document.getElementById('foto');
    const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif']; // Tipos MIME permitidos

    fotoInput.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            // Validar el tipo MIME del archivo
            if (!allowedImageTypes.includes(file.type)) {
                alert('Por favor, selecciona un archivo de imagen válido (JPEG, PNG o GIF).');
                this.value = ''; // Limpiar el input
                return;
            }

        }
    });
    </script>
</body>

</html>