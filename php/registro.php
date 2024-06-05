<?php
session_start();
$host = "localhost";
$dbname = "comunitea";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password']; 

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nombre, email, contraseña) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $hashed_password); 
if ($stmt->execute()) {
   
    header("Location: ../login.html");
    exit(); 
} else {
    echo "Error en el registro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
