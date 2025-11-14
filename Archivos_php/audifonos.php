<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DakCom - Audífonos</title>
    <script src="https://kit.fontawesome.com/141be34d11.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Archivos_css/pagina.css">
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
    </div>

    <?php
    try {
        require_once('bd_conection.php');

        $sql = "SELECT Id_Inventario, id_cat, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img 
                FROM inventario 
                INNER JOIN categorias 
                ON inventario.Id_cat = categorias.ID 
                WHERE Tipo = 'audifonos'";
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>

    <div class="array">
        <div id="top"></div>
        <div class="contenedor2">
            <div class="subtitulos">
                <h2 class="normal">Compra los <strong class="negrita">mejores audífonos</strong></h2>
            </div>
            <div class="cont-cat">
                <?php while ($productos = $resultado->fetch_assoc()) { ?>
                    <div class="productos">
                        <a href="caracteristicas.php?id=<?php echo $productos['Id_Inventario']; ?>" class="link">
                            <img class="rdondear centrarimg" src="<?php echo $productos['Img']; ?>" alt="Audífonos">
                            <div class="contenido-producto">
                                <h3><?php echo $productos['Nombre_Producto']; ?></h3>
                                <p>$<?php echo $productos['Precio']; ?></p>
                                <div class="ver-detalle">Ver detalle</div>
                            </div>
                        </a>
                        <button class="agregar-carrito" onclick="agregarAlCarrito({
                            nombre: '<?php echo $productos['Nombre_Producto']; ?>',
                            precio: <?php echo $productos['Precio']; ?>,
                            img: '<?php echo $productos['Img']; ?>'
                        })">Agregar al carrito</button>
                    </div>
                <?php } ?>
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
