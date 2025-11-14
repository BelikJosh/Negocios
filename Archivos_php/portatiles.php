<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DakCom - Portátiles</title>
    <script src="https://kit.fontawesome.com/141be34d11.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="pagina.css">
    <link rel="icon" type="image/png" href="icono.png" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <?php include 'header-principal.php'; ?>
            
    <div class="nav21">
        <a href="principal.php">
            <p>Home</p>
        </a>
        <p>></p>
        <a href="ordenadores.php">
            <p>Ordenadores</p>
        </a>
        <p>></p>
        <a href="portatiles.php">
            <p>Portátiles</p>
        </a>
    </div>
</head>
<body>
<?php
try {
    require_once('bd_conection.php');
    $sql = "SELECT Id_Inventario, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img 
            FROM inventario 
            INNER JOIN categorias 
            WHERE inventario.Id_cat = categorias.ID AND Tipo='Laptop'";
    $resultado = $conn->query($sql); 
} catch (\Exception $e) {
    echo $e->getMessage();
}
?>
<div class="array">
    <div id="#top"></div>
    <div class="contenedor2">
        <div class="subtitulos">
            <span><h2 class="normal">Llévate una <strong class="negrita">portátil</strong></h2></span>
        </div>
        <div class="cont-cat">
        <?php
        while ($productos = $resultado->fetch_assoc()) { 
        ?>
            <div class="productos">
                <a href="#" class="link">
                    <img class="rdondear centrarimg" src="<?php echo $productos['Img']; ?>" alt="Portátiles">
                    <div class="contenido-producto">
                        <h3><?php echo $productos['Nombre_Producto']; ?></h3>
                        <p>$<?php echo $productos['Precio']; ?></p>
                        <div class="ver-detalle">Ver detalle</div>
                        <!-- Agregar al carrito -->
                        <button class="agregar-carrito" onclick="agregarAlCarrito({
                            nombre: '<?php echo $productos['Nombre_Producto']; ?>',
                            precio: <?php echo $productos['Precio']; ?>,
                            img: '<?php echo $productos['Img']; ?>'
                        })">Agregar al carrito</button>
                    </div>
                </a>
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

<!-- Funcionalidad del carrito -->
<script>
    <?php include 'carrito.js'; ?>
</script>

</body>
</html>
