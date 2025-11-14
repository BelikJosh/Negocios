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
    <title>Productos por Surtir</title>
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

        /* Estilos del main */
        main.contenedor {
            padding: 4rem 2rem;
            border-radius: 10px;
        }

        .tabla-contenedor {
            overflow-x: auto;
            margin-bottom: 2rem;
            border-radius: 10px;
            background: #fff;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .tabla-inventario tbody tr:hover {
            background-color: #f1f8ff;
        }

        .btn-buscar {
            display: inline-block;
            background: linear-gradient(to right, #00008B, #1E90FF);
            color: white;
            padding: 1rem 2rem;
            font-size: 1.6rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-buscar:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        /* Estilos para el contenedor de acciones */
        .acciones {
            display: flex;
            justify-content: center;
            /* Centra el botón horizontalmente */
            margin-top: 2rem;
            /* Espacio superior */
        }

        /* Estilos para el botón "Surtir Inventario" */
        .btn-surtir {
            display: inline-block;
            background: linear-gradient(to right, #00008B, #1E90FF);
            /* Degradado azul */
            color: white;
            /* Texto blanco */
            padding: 1.5rem 3rem;
            /* Espaciado interno */
            font-size: 1.8rem;
            /* Tamaño de fuente */
            font-weight: 700;
            /* Grosor de la fuente */
            border: none;
            /* Sin borde */
            border-radius: 5px;
            /* Bordes redondeados */
            cursor: pointer;
            /* Cursor tipo pointer */
            transition: all 0.3s ease;
            /* Transición suave */
            text-align: center;
            /* Texto centrado */
            text-transform: uppercase;
            /* Texto en mayúsculas */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra */
        }

        /* Efecto hover para el botón */
        .btn-surtir:hover {
            background: linear-gradient(to right, #1E90FF, #00008B);
            /* Invierte el degradado */
            transform: translateY(-2px);
            /* Levanta el botón ligeramente */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            /* Aumenta la sombra */
        }

        /* Efecto activo (cuando se hace clic) */
        .btn-surtir:active {
            transform: translateY(0);
            /* Vuelve a la posición original */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra original */
        }

        .tabla-contenedor {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .tabla-contenedor.mostrar {
            opacity: 1;
            transform: translateY(0);
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

        .tabla-inventario th {
            font-size: 2.5rem;
            text-transform: uppercase;
            text-align: center;
        }

        /* Efecto de entrada para el botón */
        .btn-surtir {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .btn-surtir.mostrar {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <img class="icon" src="../img/dakcom.png" width="100px" alt="Logo DakCom">
            <h1>Productos a Surtir</h1>
            <nav class="navegacion-principal">
                <a href="estado_prov.php">Estado de Envíos</a>
                <a href="index.php">Inicio</a>
            </nav>
        </div>
    </header>

    <main class="contenedor">
        <div class="tabla-contenedor">
            <table class="tabla-inventario">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Vendidos</th>
                        <th>Mes</th>
                        <th>Estimación a Terminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'datos_inventario.php';
                    if (!empty($datos)) {
                        foreach ($datos as $fila) {
                            echo "<tr>
                                    <td>{$fila["Producto"]}</td>
                                    <td>{$fila["Stock"]}</td>
                                    <td>{$fila["Vendidos"]}</td>
                                    <td>{$fila["Mes"]}</td>
                                    <td>{$fila["CuandoTermina"]} meses</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron datos.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="acciones">
            <a href="surtir_inventario.php" class="btn btn-surtir">Surtir Inventario</a>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Aplicar efecto de entrada a la tabla
            document.querySelector(".tabla-contenedor").classList.add("mostrar");

            // Aplicar efecto de entrada al botón con un retraso
            setTimeout(() => {
                document.querySelector(".btn-surtir").classList.add("mostrar");
            }, 500); // Retraso de 500ms (0.5 segundos)
        });
    </script>

</body>

</html>