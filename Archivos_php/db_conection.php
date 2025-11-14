<?php

function OpenCon(): mysqli
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "dakcom";
    
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    
    if ($conn->connect_error) {
        throw new Exception("Error de conexión: " . $conn->connect_error);
    }
    
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

?>