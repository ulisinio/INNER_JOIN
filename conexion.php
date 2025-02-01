<?php
// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "join";

// Crear la conexión
$conectar = mysqli_connect($servidor, $usuario, $password, $base_datos);

// Verificar la conexión
if (!$conectar) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>