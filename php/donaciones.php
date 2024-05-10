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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $monto = $_POST["monto"];
    $mensaje = $_POST["mensaje"];

    $sql = "INSERT INTO donacion (nombre, email, monto, mensaje, fecha) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssds", $nombre, $email, $monto, $mensaje);

    if (!$stmt->execute()) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    header("Location: ../pinicio.html");
    exit();
} else {
    echo "Error al enviar el formulario";
    exit();
}

$conn->close();
