<?php
$conn = new mysqli('localhost', 'root', 'josuedavid1', 'dakcom');
if ($conn->connect_error) {
    echo $error->$conn->connect_error;
}
?>