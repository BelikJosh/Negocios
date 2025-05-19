<?php
try {
    require_once('bd_conection.php');

    // Obtener datos del cuerpo de la solicitud
    $json = file_get_contents('php://input');
    $carrito = json_decode($json, true);

    if ($carrito) {
        foreach ($carrito as $producto) {
            $nombre = $producto['nombre'];
            $cantidad = $producto['cantidad'];

            // Actualizar inventario restando la cantidad comprada
            $sql = "UPDATE inventario SET Cantidad = Cantidad - ? WHERE Nombre_Producto = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('is', $cantidad, $nombre);

            if (!$stmt->execute()) {
                throw new Exception("Error al actualizar el producto: " . $nombre);
            }
        }
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se recibieron datos del carrito.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
