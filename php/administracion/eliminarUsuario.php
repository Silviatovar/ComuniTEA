<?php
// eliminarUsuario.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuarioID"])) {
    $usuarioID = $_POST["usuarioID"];

    // Conexión a la base de datos
    $servername = "127.0.0.1";
    $database = "comunitea";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM usuario WHERE usuarioID = $usuarioID";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado exitosamente";
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: Datos de usuario no proporcionados";
}
?>
