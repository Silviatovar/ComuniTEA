<?php
session_start(); // Iniciar sesión en PHP

// Parámetros de conexión a la base de datos
$host = "localhost";  // usualmente localhost
$dbname = "comunitea";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

$stmt = $conn->prepare("UPDATE usuario SET nombre = ?, email = ?, contraseña = ? WHERE usuarioID = ?");
$stmt->bind_param("sssi", $username, $email, $pass, $_SESSION['usuario_id']);

if ($stmt->execute()) {
    echo "Perfil actualizado correctamente.";
    header("Location: ../pinicio.php");
} else {
    echo "Error al actualizar el perfil: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
