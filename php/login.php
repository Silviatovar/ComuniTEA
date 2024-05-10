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

$email = $_POST['email'];
$pass = $_POST['password'];

$query = $conn->prepare("SELECT * FROM usuario WHERE email = ? AND contraseña = ?");
$query->bind_param("ss", $email, $pass);
$query->execute();

$result = $query->get_result();
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    $_SESSION['usuario_id'] = $user['usuarioID'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['rol'] = $user['rol'];

    if ($user['rol'] == 'admin') {
        $_SESSION['admin'] = true;
    }

    echo "Inicio de sesión exitoso.";
    header("Location: ../pinicio.html");
} else {
    echo "Error: Credenciales incorrectas.";
}

$query->close();
$conn->close();
