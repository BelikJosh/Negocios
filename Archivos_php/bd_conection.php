<?php
$conn = new mysqli('localhost', 'root', '', 'dakcom');
if ($conn->connect_error) {
    echo $error->$conn->connect_error;
}
?>