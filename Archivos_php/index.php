<?php
// Detectar bots
$bots = [
    'Googlebot',
    'Bingbot',
    'BadCrawler',
];

$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$isBot = false;
foreach ($bots as $botId) {
    if (stripos($ua, $botId) !== false) {
        $isBot = true;
        break;
    }
}

if ($isBot) {
    $gzipFile = __DIR__ . '/bomb1G.gz';
    $maxCompressedSize = 100 * 1024; // 100 KB
    $maxUncompressedSize = 5 * 1024 * 1024; // 5 MB

    if (!file_exists($gzipFile)) {
        http_response_code(404);
        exit("Archivo no encontrado.");
    }

    // Validar tamaño comprimido
    if (filesize($gzipFile) > $maxCompressedSize) {
        http_response_code(413);
        exit("Archivo comprimido demasiado grande.");
    }

    // Validar tamaño descomprimido
    $fp = gzopen($gzipFile, 'rb');
    if (!$fp) {
        http_response_code(500);
        exit("No se pudo abrir el archivo gzip.");
    }

    $uncompressedSize = 0;
    $bufferSize = 4096;

    while (!gzeof($fp)) {
        $buffer = gzread($fp, $bufferSize);
        $uncompressedSize += strlen($buffer);

        if ($uncompressedSize > $maxUncompressedSize) {
            gzclose($fp);
            http_response_code(413); // Payload Too Large
            exit("El archivo descomprimido excede el límite permitido.");
        }
    }
    gzclose($fp);

    // Si pasa los controles, se entrega
    header('Content-Encoding: gzip');
    header('Content-Type: application/octet-stream');
    header('Content-Length: ' . filesize($gzipFile));
    readfile($gzipFile);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DakCom</title>
    <script src="https://kit.fontawesome.com/141be34d11.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Archivos_css/estilos.css">
    <link rel="icon" type="image/png" href="../img/icono.png" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <?php include('header-principal.php'); ?>
    
</head>
<body>
    <div id="#top"></div>
    <div class="contenedor2">
    <div><!--SLIDER-->
        <div class="id">
            <div class="slider1">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
            <!--inicio de slider-->
                        <div class="slide first">
                            <img src="../img/banner2.jpg" alt="img1" class="im1">
                        </div>
                        <div class="slide">
                            <img src="../img/banner3.jpg" alt="img2" class="im1">
                        </div>
                        <div class="slide">
                            <img src="../img/banner4.jpg" alt="img3" class="im1">
                        </div>
                        <div class="slide">
                            <img src="../img/landing.jpg" alt="img4" class="im1">
                        </div>
            <!--Fin de slider-->
            <!--Inicio de Navegacion-->
                        <div class="navigation-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>
            <!--Fin de navegacion-->
                    </div>
            <!--Inicio de navegacion manual-->
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
            <!--Fin de navegacion manual-->
            </div>
            <script type="text/javascript">
            var counter = 1;
            setInterval(function(){
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if(counter > 4){
                    counter = 1;
                }
            }, 5000);
            </script>
        </div>
    <div class="subtitulos">
    <span><h2 class="normal">Algunas <strong class="negrita"> categorías</strong></h2></span></div></div>
        <div class="cont-cat">
            <div class="categoria">
            <a href="componentes.php" class="link">
                <img class="rdondear centrarimg" src="../img/computadoras.png" alt="Computadoras">
                <h3 class="centrar">Componentes</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="monitores.php" class="link">
                <img class="rdondear centrarimg" src="../img/monitor.png" alt="Monitores">
                <h3 class="centrar">Monitores</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="ordenadores.php" class="link">
                <img class="rdondear centrarimg" src="../img/laptops.png" alt="Laptop">
                <h3 class="centrar">Ordenadores</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="celulares.php" class="link">
                <img class="rdondear centrarimg" src="../img/celular.png" alt="Celulares">
                <h3 class="centrar">Celulares</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="perifericos.php" class="link">
                <img class="rdondear centrarimg" src="../img/perifericos.png" alt="Perifericos">
                <h3 class="centrar">Perifericos</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="tablets.php" class="link">
                <img class="rdondear centrarimg" src="../img/tablet.png" alt="Tablet">
                <h3 class="centrar">Tablets</h3>
            </a>
            </div>
        </div>
        <div class="subtitulos">
            <span><h2 class="normal">Lo último <strong class="negrita"> en tecnología</strong></h2></span></div>

            <?php
            try{
                require_once('bd_conection.php');
                $sql = " SELECT Id_Inventario, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img FROM inventario INNER JOIN categorias WHERE inventario.Id_cat = categorias.ID AND Fecha = 2020 ORDER BY RAND() LIMIT 6";
                $resultado = $conn->query($sql); 
            } catch (\Eception $e){
                echo $e->getMessage();
            }
            ?>
            <div class="array">
                    <div class="cont-cat">
                <?php
                
                    while ($productos = $resultado->fetch_assoc()) { 
            
                        
                        ?>
                        <div class="productos">
                            <a href="#" class="link">
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
        
        </div>
    </div>

    

    <?php include('footer.php'); ?>
    
    
</body>
</html>