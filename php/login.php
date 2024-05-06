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
$email = $_POST['email'];
$pass = $_POST['password'];

// Preparar y ejecutar la consulta
$query = $conn->prepare("SELECT * FROM usuario WHERE email = ? AND contraseña = ?");
$query->bind_param("ss", $email, $pass); 
$query->execute();

$result = $query->get_result();
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Establecer variables de sesión
    $_SESSION['usuario_id'] = $user['usuarioID'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['rol'] = $user['rol'];

    echo "Inicio de sesión exitoso.";
    header("Location: ../pinicio.html");
} else {
    echo "Error: Credenciales incorrectas.";
}

$query->close();
$conn->close();
?>
