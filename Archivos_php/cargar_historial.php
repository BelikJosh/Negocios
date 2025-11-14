<?php
// cargar_historial.php

// Conexión a la base de datos
require_once('bd_conection.php');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener el historial de pedidos
$sql = "SELECT ID, numero_factura, fecha_factura, hora_factura, productos, total_factura, nombre_cliente, email_cliente, direccion_cliente FROM facturas";
$result = $conn->query($sql);

// Mostrar los resultados en una tabla HTML
if ($result->num_rows > 0) {
    $tablaHTML = "<table>";
    $tablaHTML .= "<tr><th>ID</th><th>Número de Factura</th><th>Fecha</th><th>Hora</th><th>Productos</th><th>Total</th><th>Nombre Cliente</th><th>Email</th><th>Dirección</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $tablaHTML .= "<tr>";
        $tablaHTML .= "<td>" . $row["ID"] . "</td>";
        $tablaHTML .= "<td>" . $row["numero_factura"] . "</td>";
        $tablaHTML .= "<td>" . $row["fecha_factura"] . "</td>";
        $tablaHTML .= "<td>" . $row["hora_factura"] . "</td>";
        $tablaHTML .= "<td>" . $row["productos"] . "</td>";
        $tablaHTML .= "<td>" . $row["total_factura"] . "</td>";
        $tablaHTML .= "<td>" . $row["nombre_cliente"] . "</td>";
        $tablaHTML .= "<td>" . $row["email_cliente"] . "</td>";
        $tablaHTML .= "<td>" . $row["direccion_cliente"] . "</td>";
        $tablaHTML .= "</tr>";
    }
    $tablaHTML .= "</table>";
    echo $tablaHTML;
} else {
    echo "<p>No se encontraron pedidos.</p>";
}

// Cerrar la conexión
$conn->close();
?>