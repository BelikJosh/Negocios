<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia por tu usuario de MySQL
$password = "josuedavid1"; // Cambia por tu contraseña de MySQL
$database = "dakcom"; // Cambia por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    // Devuelve un JSON con el error de conexión
    header('Content-Type: application/json');
    echo json_encode(["error" => "Conexión fallida: " . $conn->connect_error]);
    exit();
}

// Consulta SQL
$sql = "SELECT 
    p.Empresa AS Empresa_Encargada,
    h.id_Historial AS ID_Pedido,
    ih.Cantidad AS Cantidad_Pedida,
    h.EstadoEnvio AS Estado_Envio,
    h.Fecha AS Fecha_Pedido,
    i.Nombre_Producto AS Producto,
    c.Nombre_Categoria AS Categoria,
    h.Total AS Precio_Total
FROM historial h
JOIN inv_his ih ON h.id_Historial = ih.Folio
JOIN inventario i ON ih.Id_Inventario = i.id_inventario
JOIN proveedor p ON i.Id_proveedor = p.ID
JOIN categorias c ON i.id_cat = c.ID
ORDER BY h.Fecha DESC;";

$result = $conn->query($sql);

$data = [];

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data = ["mensaje" => "No se encontraron resultados."];
    }
} else {
    // Devuelve un JSON con el error de la consulta
    header('Content-Type: application/json');
    echo json_encode(["error" => "Error en la consulta: " . $conn->error]);
    exit();
}

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar conexión
$conn->close();
?>