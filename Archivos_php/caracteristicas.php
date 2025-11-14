<?php
    // conexion a la base de datos
    try {
        require_once('bd_conection.php');

        if (isset($_GET['id'])) {
            $id_categoria = $_GET['id'];

            // consulta para obtener el producto por Id_Categorias
            $sql = "SELECT Id_Inventario, id_cat, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img, Cantidad 
                    FROM inventario 
                    INNER JOIN categorias 
                    ON inventario.Id_cat = categorias.ID 
                    WHERE Id_Inventario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_categoria);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $producto = $resultado->fetch_assoc();
        } else {
            echo "Producto no encontrado.";
            exit();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracteristicas - <?php echo $producto['Nombre_Producto']; ?></title>
    <link rel="stylesheet" href="../Archivos_css/pagina.css">
    <script src="https://kit.fontawesome.com/141be34d11.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="icono.png" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <?php include 'header-principal.php'; ?>
</head>
<body>

    <div class="nav21">
        <a href="principal.php"><p>Home</p></a>
        <p>></p>
        <a href="perifericos.php"><p>Periféricos</p></a>
        <p>></p>
        <a href="audifonos.php"><p>Audífonos</p></a>
        <p>></p>
        <p><?php echo $producto['Nombre_Producto']; ?></p>
    </div>

    <div class="array">
        <div id="top"></div>
        <div class="contenedor2">
            <div class="subtitulos">
                <h2 class="normal">Detalles de <strong class="negrita"><?php echo $producto['Nombre_Producto']; ?></strong></h2>
            </div>

            <div class="cont-cat">
                <div class="productos">
                    <img class="rdondear centrarimg" src="<?php echo $producto['Img']; ?>" alt="Audífonos">
                    <div class="contenido-producto">
                        <h3><?php echo $producto['Nombre_Producto']; ?></h3>
                        <p><strong>Precio:</strong> $<?php echo $producto['Precio']; ?></p>
                        <p><strong>Descripción:</strong> <?php echo $producto['Descripcion']; ?></p>
                        <p><strong>Especificaciones:</strong> <?php echo $producto['Especificaciones']; ?></p>
                        <p><strong>Fecha de disponibilidad:</strong> <?php echo $producto['Fecha']; ?></p>
                        <p><strong>Cantidad disponible:</strong> <?php echo $producto['Cantidad']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $conn->close();
    ?>

    <?php include 'footer.php'; ?>
    <a href="#top">
        <div class="arriba">
            <i class="fas fa-angle-up"></i>
        </div>
    </a>
</body>
</html>
