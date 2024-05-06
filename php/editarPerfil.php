<?php
session_start(); // Iniciar sesión en PHP

// Parámetros de conexión a la base de datos
$host = "localhost";  // usualmente localhost
$dbname = "comunitea";
$user = "root";
$password = "";

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

// Actualizar los datos en la base de datos
$stmt = $conn->prepare("UPDATE usuario SET nombre = ?, email = ?, contraseña = ? WHERE usuarioID = ?");
$stmt->bind_param("sssi", $username, $email, $pass, $_SESSION['usuario_id']);

if ($stmt->execute()) {
    echo "Perfil actualizado correctamente.";
    header("Location: ../pinicio.html");
} else {
    echo "Error al actualizar el perfil: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
