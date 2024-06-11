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
$password = $_POST['password'];

// Obtener la contraseña hasheada desde la base de datos
$query = $conn->prepare("SELECT usuarioID, email, contraseña, rol ,nombre FROM usuario WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    // Verificar si la contraseña ingresada coincide con la contraseña hasheada
    if (password_verify($password, $user['contraseña'])) {
        // Las contraseñas coinciden, iniciar sesión
        $_SESSION['usuario_id'] = $user['usuarioID'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];

        if ($user['rol'] == 'admin') {
            $_SESSION['admin'] = true;
        }

        echo "Inicio de sesión exitoso.";
        header("Location: ../pinicio.php");
        exit();
    } else {
        // Las contraseñas no coinciden
        echo "Error: Credenciales incorrectas.";
    }
} else {
    // No se encontró ningún usuario con el correo electrónico proporcionado
    echo "Error: Credenciales incorrectas.";
}

$query->close();
$conn->close();
?>
