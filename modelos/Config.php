<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nomina_rlm';

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



?>