<?php
include('db_conection.php');

$conn = OpenCon();

$id = $_GET['id'];
$query = "SELECT * FROM empleados WHERE id_empleado = $id";
$resultado = mysqli_query($conn, $query);
$empleado = mysqli_fetch_assoc($resultado);

header('Content-Type: application/json');
echo json_encode($empleado);

CloseCon($conn);
?>