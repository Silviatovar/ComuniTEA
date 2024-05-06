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

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $monto = $_POST["monto"];
    $mensaje = $_POST["mensaje"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO donación (nombre, email, monto, mensaje, fecha) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssds", $nombre, $email, $monto, $mensaje);

    if (!$stmt->execute()) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    // Redireccionar a una página de agradecimiento u otra página
    header("Location: ../pinicio.html");
    exit();
} else {
    // Si no se envió el formulario correctamente, redireccionar a una página de error o mostrar un mensaje de error
    echo "Error al enviar el formulario";
    exit();
}

// Cerrar la conexión y liberar recursos
$conn->close();
?>
