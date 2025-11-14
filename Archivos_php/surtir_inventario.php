<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Archivos_css/normalize.css">
    <link rel="stylesheet" href="../diseño3.css">
    <link rel="icon" type="image/png" href="../img/icono.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Inventario</title>
    <style>
        /* Estilos generales */
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

        .contenedor {
            width: 100%;
            max-width: 120rem;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .tabla-contenedor {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 2rem auto;
            max-width: 800px;
        }

        .tabla-inventario {
            width: 100%;
            border-collapse: collapse;
        }

        .tabla-inventario td {
            padding: 1.5rem;
            border-bottom: 1px solid #ddd;
            text-align: center;
            /* Centrar el contenido de las celdas */
        }
        label, strong{
            font-size: 2rem;
        }

        .tabla-inventario td label {
            font-weight: 600;
            color: #333;
        }

        /* Estilos para el select */
        .tabla-inventario select {
            width: 100%;
            padding: 1rem;
            font-size: 1.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 0.5rem;
            transition: border-color 0.3s ease;
            background-color: #f9f9f9;
            appearance: none;
            /* Quita la apariencia por defecto */
            -webkit-appearance: none;
            /* Para Safari y Chrome */
            -moz-appearance: none;
            /* Para Firefox */
            background-image: url('data:image/svg+xml;utf8,<svg fill="%2300008B" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
            /* Flecha personalizada */
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 12px;
            text-align: center;
            /* Centrar el texto */
        }

        .tabla-inventario select:focus {
            border-color: #1E90FF;
            outline: none;
            box-shadow: 0 0 5px rgba(30, 144, 255, 0.5);
        }

        /* Estilos para el campo de cantidad */
        .tabla-inventario input[type="number"] {
            width: 100%;
            padding: 1rem;
            font-size: 1.6rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 0.5rem;
            transition: border-color 0.3s ease;
            text-align: center;
            /* Centrar el texto */
        }

        .tabla-inventario input[type="number"]:focus {
            border-color: #1E90FF;
            outline: none;
        }

        /* Quitar flechas del campo number */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
        }

        /* Estilos para el campo de total */
        .tabla-inventario p.total {
            font-size: 1.8rem;
            font-weight: 700;
            color: #00008B;
            margin: 1rem 0;
        }

        /* Estilos para los campos de la tabla */
        .tabla-inventario td {
            padding: 1.5rem;
            border-bottom: 1px solid #ddd;
            text-align: center;
            /* Centrar el contenido de las celdas */
            cursor: default;
            /* Cursor normal (no puntero) */
        }

        .tabla-inventario td label {
            font-weight: 600;
            color: #333;
            cursor: default;
            /* Cursor normal (no puntero) */
        }

        .tabla-inventario select,
        .tabla-inventario input[type="number"],
        .tabla-inventario p {
            cursor: default;
            /* Cursor normal (no puntero) */
        }

        /* Estilos para los botones */
        .btn-buscar,
        .btn-cancelar {
            display: inline-block;
            padding: 1.2rem 2.5rem;
            font-size: 1.6rem;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-buscar {
            background: linear-gradient(to right, #00008B, #1E90FF);
            color: white;
        }

        .btn-buscar:hover {
            background: linear-gradient(to right, #1E90FF, #00008B);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-cancelar {
            background: #d9534f;
            color: white;
        }

        .btn-cancelar:hover {
            background: #c9302c;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Estilos para el contenedor de botones */
        .botones-contenedor {
            display: flex;
            gap: 1rem;
            justify-content: center;
            /* Centrar los botones */
            margin-top: 2rem;
        }

        /* Estilos para la transición de entrada */
        .tabla-inventario {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <img class="icon" src="../img/dakcom.png" width="100px" alt="Logo DakCom">
            <h1>Gestión de Inventario</h1>
            <nav class="navegacion-principal">
                <a href="estado_prov.php">Estado de Envíos</a>
                <a href="surtir.php">Mercancía a Surtir</a>
                <a href="index.php">Inicio</a>
            </nav>
        </div>
    </header>

    <main class="contenedor">
        <div class="tabla-contenedor">
            <table class="tabla-inventario">
                <tbody>
                    <tr>
                        <td>
                            <label for="producto-select">Producto:</label>
                            <select id="producto-select">
                                <option value="" disabled selected>Seleccione un producto</option> <!-- Placeholder no seleccionable -->
                                <?php
                                include 'datos_inventario.php';
                                if (!empty($datos)) {
                                    foreach ($datos as $fila) {
                                        echo ("<option value='" . $fila["ID"] . "'>" . $fila["Producto"] . "</option>");
                                    }
                                } else {
                                    echo "<option value=''>No se encontraron productos</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="quantity">Cantidad:</label>
                            <input type="number" id="quantity" placeholder="Ingrese cantidad">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Empresa proveedora:</strong> <span id="empresa"></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="total"><strong>Total:</strong> <span id="total">$0.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="botones-contenedor">
                                <button id="generar-pedido" class="btn-buscar">Generar Pedido</button>
                                <a href="inventario.php"><button class="btn-cancelar">Cancelar</button></a>
                            </div>
                            <input type="hidden" id="producto-id-oculto" name="producto_id_oculto" value="">
                            <input type="hidden" id="producto-id2-oculto" name="producto_id2_oculto" value="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            // Inicializar el select con "Seleccione un producto"
            $('#producto-select').val('');

            $('#producto-select').change(function() {
                var producto_id = $(this).val();
                $('#producto-id-oculto').val(producto_id);
                if (producto_id != "") {
                    $.ajax({
                        url: 'obtener_detalles.php',
                        type: 'GET',
                        data: {
                            producto_id: producto_id
                        },
                        success: function(response) {
                            var datos = JSON.parse(response);
                            $('#empresa').text(datos.empresa);
                            $('#producto-id2-oculto').val(datos.id_prov);
                        }
                    });
                } else {
                    $('#empresa').text('');
                    $('#producto-id2-oculto').val('');
                }
            });

            // Calcular el total del pedido
            $('#quantity').on('input', function() {
                var cantidad = $(this).val();
                var precioBase = 150; // Precio base por producto
                var total = cantidad * precioBase;

                if (cantidad >= 100) {
                    total *= 0.90; // 10% de descuento
                } else if (cantidad >= 51) {
                    total *= 0.95; // 5% de descuento
                } else if (cantidad >= 11) {
                    total *= 0.975; // 2.5% de descuento
                }

                $('#total').text('$' + total.toFixed(2)); // Mostrar el total con 2 decimales
            });

            // Validación al hacer clic en "Generar Pedido"
            $('#generar-pedido').click(function() {
                var producto_id = $('#producto-id-oculto').val();
                var cantidad = $('#quantity').val();

                // Validación de campos obligatorios
                if (!producto_id || producto_id === "") {
                    alert("Por favor, seleccione un producto.");
                    return; // Detiene la ejecución si no se selecciona un producto
                }

                if (!cantidad || cantidad <= 0 || isNaN(cantidad)) {
                    alert("Por favor, ingrese una cantidad válida.");
                    return; // Detiene la ejecución si no se ingresa una cantidad válida
                }

                var proveedor_id = $('#producto-id2-oculto').val();
                $.ajax({
                    url: "procesar_pedido.php",
                    type: 'POST',
                    data: {
                        producto_id: producto_id,
                        cantidad: cantidad,
                        proveedor_id: proveedor_id
                    },
                    success: function(response) {
                        alert(response);
                        window.location.href = "estado_prov.php";
                    }
                });
            });
        });
        $(document).ready(function() {
            $(".tabla-inventario").css({
                opacity: "1",
                transform: "translateY(0)"
            });
        });
    </script>
</body>

</html>