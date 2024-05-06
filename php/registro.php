<?php
// Parámetros de conexión a la base de datos
$host = "localhost";
$dbname = "comunitea";
$user = "root";
$password = "";

// Crear la conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password']; // Asegúrate de cifrar la contraseña antes de almacenarla

// Cifrar la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertar el nuevo usuario en la base de datos
$sql = "INSERT INTO usuario (nombre, email, contraseña) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $hashed_password); // 'sss' indica que los parámetros son strings
if ($stmt->execute()) {
    // Registro exitoso, redirigir al usuario a la página de inicio de sesión
    header("Location: ../login.html");
    exit(); // Finalizar el script después de redireccionar
} else {
    echo "Error en el registro: " . $conn->error;
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conn->close();
?>
