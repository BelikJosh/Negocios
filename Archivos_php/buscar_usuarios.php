<?php
include('db_conection.php');
$conn = OpenCon();

$query = "SELECT id, Nombre, Email FROM cuentas";
$resultado = mysqli_query($conn, $query);

$usuarios = array();
while ($row = mysqli_fetch_assoc($resultado)) {
    $usuarios[] = $row;
}

header('Content-Type: application/json');
echo json_encode($usuarios);

CloseCon($conn);
?>
