<?php
// Verificar si se pasó el ID del producto
if (isset($_GET['producto_id'])) {
    $producto_id = $_GET['producto_id'];

    // Conectar a la base de datos
    include '../Archivos_php/db_conection.php';
    $conn = OpenCon();

    // Consulta para obtener la empresa proveedora
    $sql = "SELECT inventario.Id_Inventario as ID, inventario.Id_proveedor as ID_Prov, proveedor.Empresa as Empresa
            FROM inventario
            INNER JOIN proveedor ON inventario.Id_proveedor = proveedor.ID
            WHERE inventario.Id_Inventario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id); // Vinculamos el ID del producto
    $stmt->execute();
    $stmt->bind_result($id, $id_prov, $empresa); // Asignamos correctamente las columnas

    // Crear un arreglo con los resultados
    $response = array();
    if ($stmt->fetch()) {
        $response = array(
            'empresa' => $empresa,
            'id_prov' => $id_prov
        );
    }

    // Cerrar la conexión
    $stmt->close();
    CloseCon($conn);

    // Devolver la respuesta como JSON
    echo json_encode($response);
}
?>
