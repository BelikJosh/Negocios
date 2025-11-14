<?php
// procesar_pedido.php
include '../Archivos_php/db_conection.php';
$conn = OpenCon();

// Recibe los datos del formulario
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];
$empresa = $_POST['proveedor_id'];

// Escapa los datos para prevenir inyección SQL
$producto_id = $conn->real_escape_string($producto_id);
$cantidad = $conn->real_escape_string($cantidad);
$empresa = $conn->real_escape_string($empresa);

// Precio base por producto
$precio_base = 150;

// Calcular el precio total con descuentos
$precio_total = $cantidad * $precio_base;

if ($cantidad >= 100) {
    $precio_total *= 0.90; // 10% de descuento
} elseif ($cantidad >= 51) {
    $precio_total *= 0.95; // 5% de descuento
} elseif ($cantidad >= 11) {
    $precio_total *= 0.975; // 2.5% de descuento
}

// Redondear el precio total a 2 decimales
$precio_total = round($precio_total, 2);

// Función para generar un ID de historial aleatorio de cuatro dígitos
function generarIdHistorial($conn) {
    do {
        $idGen = rand(1000, 9999); // Genera un número aleatorio de 4 dígitos
        // Verifica si el ID ya existe en la tabla historial
        $sql = "SELECT id_Historial FROM historial WHERE id_Historial = '$idGen'";
        $result = $conn->query($sql);
    } while ($result->num_rows > 0); // Repite si el ID ya existe

    return $idGen;
}

// Generar un ID de historial único
$idGen = generarIdHistorial($conn);

// Inserta los datos en la tabla historial
$sql = "INSERT INTO historial (id_Historial, Id_Cuenta, EstadoEnvio, Total) VALUES ('$idGen', '$empresa', 'Preparando', '$precio_total')";

if ($conn->query($sql) === TRUE) {
    // Inserta los datos en la tabla inv_his
    $sql2 = "INSERT INTO inv_his (Folio, Id_Inventario, Cantidad) VALUES ('$idGen', '$producto_id', '$cantidad')";
    $conn->query($sql2);

    echo "Pedido generado con éxito, Id generado: " . $idGen;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>