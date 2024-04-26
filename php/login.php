<?php
session_start();
include 'conex.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Consulta preparada para evitar inyección SQL
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Obtener el resultado de la consulta
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró un usuario con ese correo electrónico
    if ($usuario) {
        // Verificar la contraseña
        if (password_verify($contraseña, $usuario['contraseña'])) {
            // Inicio de sesión exitoso
            $_SESSION['loggedin'] = true;
            $_SESSION['usuarioID'] = $usuario['usuarioID'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir a la página de inicio o al panel de control, dependiendo del rol
            if ($usuario['rol'] == 'admin') {
                header("Location: panel_admin.php");
            } else {
                header("Location: inicio.php");
            }
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
