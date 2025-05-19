<?php
$servername = "localhost";
$database = "dakcom";
$username = "root";
$password = "iram2003";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

	$nombre= $_POST["nombre"];
	$correo= $_POST["correo"];
    $contraseña= $_POST["contraseña"];
    $contraseña2= $_POST["contraseña2"];

	$insertar="INSERT INTO cuentas (Id,Nombre,Email,Contraseña) VALUES 
    ('','$nombre','$correo','$contraseña')";
    if($contraseña==$contraseña2){
	$consulta = mysqli_query($conn, $insertar);
    }else{
        
    }

    
	if($consulta){
		echo "<script>alert('El registro se guardo con éxito.');
		window.location='/DAKCOM';</script>";
	}
	else {
		echo "<script>alert('No se pudo guardar el registro.');
		window.history.go(-1);</script>";
		
	}
mysqli_close($conn);
?>