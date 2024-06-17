<?php
session_start();

$servername = "mysql.webcindario.com";
$username = "comunitea";
$password = "comunitea";
$dbname = "comunitea";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener información del formulario
$open_by = $_POST['open_by'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$status = "abierto"; // Por defecto, el ticket se crea con status "abierto"

// Preparar la consulta SQL para insertar un nuevo ticket
$stmt = $conn->prepare("INSERT INTO tickets (user_id, open_by, email, mensaje,fecha_inicio, status) VALUES (?, ?, ?, ?, NOW(), ?)");
$stmt->bind_param("sssss", $_SESSION['usuario_id'], $open_by, $email, $mensaje, $status);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Ticket creado correctamente.";
    header("Location: ../index.php"); // Redirigir a la página principal
} else {
    echo "Error al crear el ticket: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
