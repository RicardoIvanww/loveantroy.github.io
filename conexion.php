<?php
$host = "localhost";
$usuario = "root";
$password = "";
$basededatos = "loveantro";

$conexion = mysqli_connect($host, $usuario, $password, $basededatos);
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>