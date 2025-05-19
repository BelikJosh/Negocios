<?php
include '../Archivos_php/db_conection.php';
$conn = OpenCon();

$sql = "SELECT inventario.Id_Inventario as ID, LEFT(inventario.Nombre_Producto,41) as Producto, inventario.Precio as 'Precio Unitario', inventario.Cantidad as Stock, sum(inv_ped.Cantidad) as Vendidos, MONTHNAME(pedido.FechaEnvio) as Mes, FLOOR(2000/SUM(inv_ped.Cantidad)) as CuandoTermina
	FROM inventario
    INNER JOIN inv_ped ON inventario.Id_Inventario = inv_ped.Id_Inventario 
    INNER JOIN pedido ON inv_ped.Id_Pedido = Pedido.ID 
    GROUP BY inventario.Id_Inventario, MONTHNAME(pedido.FechaEnvio)"; // Reemplaza con tu consulta SQL
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $datos = array();
    // Obtener datos de cada fila
    while ($row = $result->fetch_assoc()) {
        $datos[] = $row; // Agregar cada fila al array de datos
    }
} else {
    echo "0 resultados";
}
CloseCon($conn);
?>