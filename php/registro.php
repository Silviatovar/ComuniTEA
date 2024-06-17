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

// Verifica el token CSRF
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Token CSRF no válido");
}

// Valida y sanitiza los datos
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Validaciones adicionales
if (!$nombre || !$email || !$password) {
    $_SESSION['error_message'] = "Datos no válidos. Por favor, verifica la información e inténtalo nuevamente.";
    header("Location: ../registro.php");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_message'] = "Correo electrónico no válido. Por favor, ingresa una dirección de correo válida.";
    header("Location: ../registro.php");
    exit();
}

if (!preg_match('/^(?=.*[A-Z]).{6,}$/', $password)) {
    $_SESSION['error_message'] = "La contraseña debe tener al menos 6 caracteres y contener al menos una letra mayúscula.";
    header("Location: ../registro.php");
    exit();
}

// Verificar si el email ya existe (ajustar según el nombre de tu columna de email)
$stmt = $conn->prepare("SELECT usuarioID FROM usuario WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error_message'] = "Esta cuenta de correo electrónico ya está registrada. Por favor, utiliza otro correo.";
    $stmt->close();
    $conn->close();
    header("Location: ../registro.php");
    exit();
}

$stmt->close();

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nombre, email, contraseña) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $hashed_password);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "Registro exitoso. Ahora puedes iniciar sesión.";
    header("Location: ../login.php");
    exit();
} else {
    $_SESSION['error_message'] = "Error en el registro: " . $conn->error;
    header("Location: ../registro.php");
    exit();
}

$stmt->close();
$conn->close();
?>
