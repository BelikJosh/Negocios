<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos
require_once('bd_conection.php');

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => "Database Connection Error: " . $conn->connect_error]);
    exit;
}

// Obtener los datos de la factura del cuerpo de la solicitud
$factura = json_decode(file_get_contents('php://input'), true);

if ($factura) {
    // Generar un número de factura aleatorio
    $numeroFactura = rand(100000, 999999);

    // Obtener la fecha y hora actual
    $fechaFactura = date('Y-m-d');
    $horaFactura = date('H:i:s');

    // Preparar la consulta SQL (AÑADIR total_factura)
    $sql = "INSERT INTO facturas (numero_factura, fecha_factura, hora_factura, productos, nombre_cliente, email_cliente, direccion_cliente, total_factura) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular los parámetros (AÑADIR total)
        $productos = json_encode($factura['productos']);
        $totalFactura = $factura['total']; // Asegúrate de que estás enviando 'total' desde JavaScript
        $stmt->bind_param("sssssssd", $numeroFactura, $fechaFactura, $horaFactura, $productos, $factura['cliente']['nombre'], $factura['cliente']['email'], $factura['cliente']['direccion'], $totalFactura);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $facturaId = $conn->insert_id; // Obtener el ID de la factura generada
            echo json_encode(['success' => true, 'facturaId' => $facturaId]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error al guardar la factura: ' . $stmt->error]);
        }

        // Cerrar la declaración preparada
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al preparar la consulta: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No data received']);
}

$conn->close();
?>