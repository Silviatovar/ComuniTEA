<?php
// Parámetros de conexión a la base de datos
$host = "localhost";
$dbname = "nombre_basedatos";
$user = "usuario";
$password = "contraseña";

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los usuarios
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Crear un array para almacenar los datos
$data = array();

// Si hay resultados, agregarlos al array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cerrar conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
