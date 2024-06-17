<?php
session_start(); // Iniciar sesión en PHP

$servername = "mysql.webcindario.com";
$username = "comunitea";
$password = "comunitea";
$dbname = "comunitea";

$conn = new mysqli($servername, $username, $password, $dbname);

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
