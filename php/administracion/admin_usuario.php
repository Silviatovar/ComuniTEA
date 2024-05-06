<?php
session_start();
// Parámetros de conexión a la base de datos
$host = "localhost";  // usualmente localhost
$dbname = "comunitea";
$user = "root";
$password = "";
// Crear la conexión a la base de datos
$conexion = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}
