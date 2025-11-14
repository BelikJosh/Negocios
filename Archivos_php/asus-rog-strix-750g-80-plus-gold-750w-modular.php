<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DakCom</title>
    <script src="https://kit.fontawesome.com/141be34d11.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Archivos_css/pagina.css">
    <link rel="stylesheet" href="Archivos_css/productos.css">
    <link rel="icon" type="image/png" href="icono.png" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php include 'header-productos.php'; ?>
            
    
            <div class="nav21">
                <a href="principal.php">
                    <p>Home</p>
                </a>
                <p>></p>
                <a href="componentes.php">
                    <p>Componentes</p>
                </a>
                <p>></p>
                <a href="fuentes-de-poder.php">
                    <p>Fuentes de Poder</p>
                </a>
            </div>
        </ul>
        
    </nav>

</head>
<body>
<?php
try{
    require_once('bd_conection.php');
    $sql = " SELECT Id_Inventario, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img, Marca FROM inventario INNER JOIN categorias WHERE inventario.Id_cat = categorias.ID AND Nombre_Producto='Asus ROG Strix 750G 80 Plus Gold 750W Modular'";
    $resultado = $conn->query($sql); 
} catch (\Eception $e){
    echo $e->getMessage();
}
?>
<div class="array">
    <div id="#top"></div>
    <div class="contenedor2">
        <div class="subtitulos">
            
        <div class="cont-cat">
    <?php
    
        while ($productos = $resultado->fetch_assoc()) { 

            
            ?>
            
        <div class="contenedor-productos">
            <div class="imagen">
                <img src="img/Asus ROG Strix 750G.jpg" alt="">
            </div>
            <div class="datos">
                <h1><strong><?php echo $productos['Nombre_Producto'];?></strong></h1>
                <p class="precio">$<?php echo $productos['Precio'];?><p class="mxn">MXN</p></p>
                <span>Vendido y enviado por <strong>Dakcom</strong></span>
                <p class="descripcion mas"><?php echo $productos['Descripcion'];?></p>
                <div class="cont-subdatos">
                    <div class="sub">
                    <strong class="subdatos">Marca:</strong>
                    <strong class="subdatos">Cantidad:</strong>
                    <strong class="subdatos">Envio:</strong>
                    </div>
                    <div class="dat">
                        <p class="marca"><?php echo $productos['Marca'];?></p>
                        <input type="number" min="1" step="1" value="1" max="20">
                        <p class="envio"><strong>Gratis</strong> a partir de $499.99 MXN</p>
                    </div>
                </div>
                <div class="botones">
                    <div class="añadir">
                        <form action="agregarcarrito.php">
                            <button class="carro" value="0" type="submit">Añadir al carrito</button>
                        </form>
                    </div>
                    <div class="comprar">
                        <button class="compra" value="1" type="submit">Comprar</button>
                    </div>
                </div>
                
                
            </div>
        </div>
        
    </div>


        <?php  }
        
    ?>
    </div>
    </div>
          
    

</div>
<?php
    
?>
    
    <?php
try{
    require_once('bd_conection.php');
    $sql = " SELECT Id_Inventario, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img, Marca, Redireccionar FROM inventario INNER JOIN categorias WHERE inventario.Id_cat = categorias.ID AND Tipo='Fuente de Alimentación'";
    $resultado = $conn->query($sql); 
} catch (\Eception $e){
    echo $e->getMessage();
}
?>
<div class="array">
    <div id="#top"></div>
    <div class="contenedor2">
        <div class="subtitulos">
            <span><h2 class="normal">Productos <strong class="negrita"> similares</strong></h2></span></div>
        <div class="cont-cat">
    <?php
    
        while ($productos = $resultado->fetch_assoc()) { 

            
            ?>
            <div class="productos">
                <a href="<?php echo $productos['Redireccionar'];?>" class="link">
                    <img class="rdondear centrarimg" src="<?php echo $productos['Img']; ?>" alt="Computadoras">
                    <div class="contenido-producto">
                        <h3><?php echo $productos['Nombre_Producto'];?></h3>
                        <p>$<?php echo $productos['Precio'] ?></p>
                        <div class="ver-detalle">Ver detalle</div>
                    </div>
                    
                </a>
            </div>
        <?php  }
        
    ?>
    </div>
    </div>
          
    

</div>
<?php
    $conn->close();
?>
    <?php include 'footer.php'; ?>
    <a href="#top" >
        <div class="arriba">
            <i class="fas fa-angle-up"></i>
        </div>
    
    </a>
</body>
</html>